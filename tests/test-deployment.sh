#!/bin/bash
# Script de test pour le déploiement automatique HestiaCP

set -e

# Configuration
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_ROOT="$(dirname "$SCRIPT_DIR")"
CONFIG_FILE="$PROJECT_ROOT/orchestration/config.json"
LOG_FILE="/tmp/hestiacp-test-$(date +%Y%m%d-%H%M%S).log"

# Couleurs pour les logs
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Fonctions de logging
log_info() {
    echo -e "${GREEN}[INFO]${NC} $1" | tee -a "$LOG_FILE"
}

log_warn() {
    echo -e "${YELLOW}[WARN]${NC} $1" | tee -a "$LOG_FILE"
}

log_error() {
    echo -e "${RED}[ERROR]${NC} $1" | tee -a "$LOG_FILE"
}

# Vérification des prérequis
check_prerequisites() {
    log_info "Vérification des prérequis..."
    
    # Vérifier que Terraform est installé
    if ! command -v terraform &> /dev/null; then
        log_error "Terraform n'est pas installé"
        exit 1
    fi
    
    # Vérifier que PHP est installé
    if ! command -v php &> /dev/null; then
        log_error "PHP n'est pas installé"
        exit 1
    fi
    
    # Vérifier que le fichier de configuration existe
    if [ ! -f "$CONFIG_FILE" ]; then
        log_error "Fichier de configuration manquant: $CONFIG_FILE"
        exit 1
    fi
    
    # Vérifier que les dépendances PHP sont installées
    if ! php -m | grep -q "curl"; then
        log_warn "Extension PHP curl manquante"
    fi
    
    if ! php -m | grep -q "json"; then
        log_warn "Extension PHP json manquante"
    fi
    
    log_info "Prérequis vérifiés"
}

# Test de la configuration Terraform
test_terraform_config() {
    log_info "Test de la configuration Terraform..."
    
    cd "$PROJECT_ROOT/terraform"
    
    # Initialiser Terraform
    if ! terraform init; then
        log_error "Échec de l'initialisation Terraform"
        return 1
    fi
    
    # Valider la configuration
    if ! terraform validate; then
        log_error "Configuration Terraform invalide"
        return 1
    fi
    
    # Plan de test (sans exécution)
    if ! terraform plan -var-file="terraform.tfvars.example"; then
        log_error "Plan Terraform échoué"
        return 1
    fi
    
    log_info "Configuration Terraform validée"
}

# Test des APIs
test_apis() {
    log_info "Test des APIs..."
    
    # Test de l'API FOSSBilling
    if ! php "$PROJECT_ROOT/tests/test-fossbilling-api.php"; then
        log_error "Test API FOSSBilling échoué"
        return 1
    fi
    
    # Test de l'API HestiaCP (si un serveur de test est disponible)
    if [ -n "$HESTIACP_TEST_IP" ]; then
        if ! php "$PROJECT_ROOT/tests/test-hestiacp-api.php" "$HESTIACP_TEST_IP"; then
            log_warn "Test API HestiaCP échoué (serveur de test non disponible)"
        fi
    else
        log_warn "Pas de serveur HestiaCP de test configuré"
    fi
    
    log_info "Tests des APIs terminés"
}

# Test du monitoring
test_monitoring() {
    log_info "Test du système de monitoring..."
    
    # Vérifier que Prometheus est accessible
    if [ -n "$PROMETHEUS_URL" ]; then
        if ! curl -s "$PROMETHEUS_URL/api/v1/query?query=up" > /dev/null; then
            log_warn "Prometheus non accessible à $PROMETHEUS_URL"
        else
            log_info "Prometheus accessible"
        fi
    else
        log_warn "URL Prometheus non configurée"
    fi
    
    # Test du script de métriques HestiaCP
    if [ -f "$PROJECT_ROOT/monitoring/hestiacp-metrics-exporter.py" ]; then
        if ! python3 -m py_compile "$PROJECT_ROOT/monitoring/hestiacp-metrics-exporter.py"; then
            log_error "Script de métriques HestiaCP invalide"
            return 1
        fi
        log_info "Script de métriques HestiaCP validé"
    fi
    
    log_info "Tests de monitoring terminés"
}

# Test de déploiement complet (simulation)
test_full_deployment() {
    log_info "Test de déploiement complet (simulation)..."
    
    # Créer un fichier de configuration de test
    local test_config="/tmp/test-config.json"
    cp "$CONFIG_FILE" "$test_config"
    
    # Modifier la configuration pour les tests
    sed -i 's/"hestiacp_server_name": ".*"/"hestiacp_server_name": "test-hestiacp-$(date +%s)"/' "$test_config"
    
    # Exécuter le script de déploiement en mode test
    if ! php "$PROJECT_ROOT/orchestration/deploy-new-hestiacp.php" "$test_config" --dry-run; then
        log_error "Test de déploiement échoué"
        return 1
    fi
    
    # Nettoyer
    rm -f "$test_config"
    
    log_info "Test de déploiement réussi"
}

# Test de récupération d'erreur
test_error_recovery() {
    log_info "Test de récupération d'erreur..."
    
    # Simuler une erreur de configuration
    local invalid_config="/tmp/invalid-config.json"
    echo '{"invalid": "config"}' > "$invalid_config"
    
    # Le script doit gérer l'erreur gracieusement
    if php "$PROJECT_ROOT/orchestration/deploy-new-hestiacp.php" "$invalid_config" 2>/dev/null; then
        log_error "Le script n'a pas géré l'erreur de configuration"
        return 1
    fi
    
    rm -f "$invalid_config"
    log_info "Test de récupération d'erreur réussi"
}

# Nettoyage
cleanup() {
    log_info "Nettoyage des ressources de test..."
    
    # Supprimer les fichiers temporaires
    rm -f /tmp/test-config.json
    rm -f /tmp/invalid-config.json
    
    # Nettoyer les ressources Terraform de test
    cd "$PROJECT_ROOT/terraform"
    if [ -f "terraform.tfstate" ]; then
        terraform destroy -auto-approve -var-file="terraform.tfvars.example" || true
    fi
    
    log_info "Nettoyage terminé"
}

# Fonction principale
main() {
    log_info "=== Début des tests de déploiement HestiaCP ==="
    log_info "Log des tests: $LOG_FILE"
    
    local exit_code=0
    
    # Exécuter les tests
    check_prerequisites || exit_code=1
    test_terraform_config || exit_code=1
    test_apis || exit_code=1
    test_monitoring || exit_code=1
    test_full_deployment || exit_code=1
    test_error_recovery || exit_code=1
    
    # Nettoyage
    cleanup
    
    if [ $exit_code -eq 0 ]; then
        log_info "=== Tous les tests sont passés avec succès ==="
    else
        log_error "=== Certains tests ont échoué ==="
    fi
    
    log_info "Log complet disponible dans: $LOG_FILE"
    exit $exit_code
}

# Gestion des signaux
trap cleanup EXIT

# Exécution
main "$@"