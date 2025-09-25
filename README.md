# 🚀 Automatisation HestiaCP + FOSSBilling

## Vue d'ensemble

Ce projet automatise le déploiement de nouveaux serveurs HestiaCP sur OpenStack lorsque la capacité du serveur existant est atteinte, avec intégration automatique dans FOSSBilling.

## 🏗️ Architecture

```
[Prometheus] → [AlertManager] → [Webhook] → [Terraform] → [OpenStack] → [HestiaCP] → [FOSSBilling]
     ↓              ↓            ↓           ↓            ↓           ↓            ↓
  Monitoring    Alerting    Déclenchement  IaC        VM Creation  Auto-config  API Integration
```

## 📁 Structure du projet

```
├── monitoring/                 # Système de monitoring
│   ├── prometheus-config.yml   # Configuration Prometheus
│   ├── hestiacp_rules.yml      # Règles d'alerte
│   └── hestiacp-metrics-exporter.py  # Exporter métriques HestiaCP
├── terraform/                  # Infrastructure as Code
│   ├── main.tf                 # Configuration Terraform
│   ├── user_data.sh            # Script d'initialisation VM
│   └── terraform.tfvars.example
├── fossbilling-integration/    # Intégration FOSSBilling
│   ├── fossbilling-api-client.php
│   └── hestiacp-api-client.php
├── orchestration/              # Scripts d'orchestration
│   ├── deploy-new-hestiacp.php # Déploiement principal
│   ├── webhook-handler.php     # Gestionnaire webhook
│   └── config.json.example     # Configuration
├── tests/                      # Tests et validation
│   ├── test-deployment.sh      # Tests complets
│   ├── test-fossbilling-api.php
│   └── test-hestiacp-api.php
└── README.md                   # Documentation
```

## 🚀 Installation et Configuration

### 1. Prérequis

- **OpenStack** : Cluster configuré et accessible
- **Terraform** : Version >= 1.0
- **PHP** : Version >= 7.4 avec extensions curl, json
- **Prometheus** : Pour le monitoring
- **FOSSBilling** : Instance configurée avec API

### 2. Configuration

1. **Copier les fichiers de configuration** :
   ```bash
   cp terraform/terraform.tfvars.example terraform/terraform.tfvars
   cp orchestration/config.json.example orchestration/config.json
   ```

2. **Configurer Terraform** :
   ```bash
   cd terraform/
   # Éditer terraform.tfvars avec vos paramètres OpenStack
   terraform init
   terraform plan
   ```

3. **Configurer l'orchestration** :
   ```bash
   # Éditer orchestration/config.json avec vos paramètres
   ```

4. **Configurer Prometheus** :
   ```bash
   # Copier monitoring/prometheus-config.yml vers votre Prometheus
   # Copier monitoring/hestiacp_rules.yml vers votre Prometheus
   ```

### 3. Déploiement

1. **Installer les dépendances PHP** :
   ```bash
   composer install
   ```

2. **Configurer le webhook Prometheus** :
   - URL : `http://your-server/orchestration/webhook-handler.php`
   - Méthode : POST

3. **Tester le système** :
   ```bash
   chmod +x tests/test-deployment.sh
   ./tests/test-deployment.sh
   ```

## 🔧 Utilisation

### Déploiement manuel

```bash
php orchestration/deploy-new-hestiacp.php
```

### Déploiement automatique

Le système se déclenche automatiquement quand :
- CPU > 85% pendant 3 minutes
- RAM > 95% pendant 3 minutes  
- Utilisateurs > 95% de la limite

### Monitoring

- **Prometheus** : `http://prometheus:9090`
- **Grafana** : Dashboards pour visualiser les métriques
- **Logs** : `/var/log/hestiacp-automation.log`

## 📊 Métriques surveillées

- `hestiacp_users_count` : Nombre d'utilisateurs
- `hestiacp_domains_count` : Nombre de domaines
- `hestiacp_cpu_usage_percent` : Utilisation CPU
- `hestiacp_memory_usage_percent` : Utilisation mémoire
- `hestiacp_disk_usage_percent` : Utilisation disque

## 🔒 Sécurité

- **Clés API** : Générées automatiquement pour chaque serveur
- **Whitelist IP** : FOSSBilling ajouté automatiquement
- **Firewall** : Règles configurées via Terraform
- **HTTPS** : Certificats SSL gérés par HestiaCP

## 🧪 Tests

```bash
# Tests complets
./tests/test-deployment.sh

# Test API FOSSBilling
php tests/test-fossbilling-api.php

# Test API HestiaCP
php tests/test-hestiacp-api.php HESTIACP_IP
```

## 📝 Logs et Debugging

- **Logs d'orchestration** : `/var/log/hestiacp-automation.log`
- **Logs Terraform** : `terraform/terraform.log`
- **Logs HestiaCP** : `/var/log/hestia/`

## 🔄 Maintenance

### Mise à jour des configurations

1. Modifier les fichiers de configuration
2. Redémarrer les services
3. Tester avec `./tests/test-deployment.sh`

### Nettoyage des ressources

```bash
# Détruire les ressources Terraform
cd terraform/
terraform destroy

# Nettoyer les logs
rm -f /var/log/hestiacp-automation.log
```

## 🆘 Dépannage

### Problèmes courants

1. **Terraform échoue** :
   - Vérifier les credentials OpenStack
   - Vérifier les quotas de ressources

2. **HestiaCP non accessible** :
   - Vérifier les règles de firewall
   - Vérifier l'installation HestiaCP

3. **FOSSBilling ne voit pas le serveur** :
   - Vérifier la clé API
   - Vérifier la connectivité réseau

### Logs utiles

```bash
# Logs d'orchestration
tail -f /var/log/hestiacp-automation.log

# Logs Terraform
cd terraform/ && terraform show

# Logs HestiaCP
tail -f /var/log/hestia/hestia.log
```

## 📈 Évolutions possibles

- **Load Balancing** : Répartition de charge entre serveurs
- **Auto-scaling** : Ajustement automatique des ressources
- **Backup automatique** : Sauvegarde des configurations
- **Monitoring avancé** : Alertes personnalisées
- **Multi-région** : Déploiement sur plusieurs régions

## 🤝 Contribution

1. Fork le projet
2. Créer une branche feature
3. Commiter les changements
4. Pousser vers la branche
5. Créer une Pull Request

## 📄 Licence

MIT License - Voir le fichier LICENSE pour plus de détails.

## 📞 Support

- **Documentation** : [Wiki du projet]
- **Issues** : [GitHub Issues]
- **Email** : support@your-domain.com