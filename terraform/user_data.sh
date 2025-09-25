#!/bin/bash
# Script d'initialisation pour HestiaCP sur OpenStack

set -e

# Variables
FOSSBILLING_IP="${fossbilling_ip}"
HESTIACP_DOMAIN="${hestiacp_domain}"
HESTIACP_ADMIN_EMAIL="admin@${hestiacp_domain}"

# Mise à jour du système
apt-get update
apt-get upgrade -y

# Installation des dépendances
apt-get install -y curl wget unzip software-properties-common

# Installation de HestiaCP
wget https://raw.githubusercontent.com/hestiacp/hestiacp/release/install/hcp-install.sh
chmod +x hcp-install.sh
./hcp-install.sh --interactive no --email "$HESTIACP_ADMIN_EMAIL" --password "$(openssl rand -base64 32)" --hostname "$(hostname)" --force

# Configuration HestiaCP pour FOSSBilling
# Autoriser l'IP de FOSSBilling
echo "$FOSSBILLING_IP" >> /usr/local/hestia/data/firewall/ipv4.whitelist

# Créer une clé API pour FOSSBilling
/usr/local/hestia/bin/v-add-user-api-key admin "FOSSBilling Integration" "fossbilling-$(date +%s)"

# Configuration du monitoring
# Installation de Node Exporter
wget https://github.com/prometheus/node_exporter/releases/download/v1.6.1/node_exporter-1.6.1.linux-amd64.tar.gz
tar xzf node_exporter-1.6.1.linux-amd64.tar.gz
cp node_exporter-1.6.1.linux-amd64/node_exporter /usr/local/bin/
useradd --no-create-home --shell /bin/false node_exporter
chown node_exporter:node_exporter /usr/local/bin/node_exporter

# Service Node Exporter
cat > /etc/systemd/system/node_exporter.service << EOF
[Unit]
Description=Node Exporter
Wants=network-online.target
After=network-online.target

[Service]
User=node_exporter
Group=node_exporter
Type=simple
ExecStart=/usr/local/bin/node_exporter

[Install]
WantedBy=multi-user.target
EOF

systemctl daemon-reload
systemctl enable node_exporter
systemctl start node_exporter

# Installation du script de métriques HestiaCP
wget -O /usr/local/bin/hestiacp-metrics-exporter.py https://raw.githubusercontent.com/your-repo/hestiacp-automation/main/monitoring/hestiacp-metrics-exporter.py
chmod +x /usr/local/bin/hestiacp-metrics-exporter.py

# Service pour les métriques HestiaCP
cat > /etc/systemd/system/hestiacp-metrics.service << EOF
[Unit]
Description=HestiaCP Metrics Exporter
After=network.target

[Service]
Type=simple
User=root
ExecStart=/usr/bin/python3 /usr/local/bin/hestiacp-metrics-exporter.py
Restart=always

[Install]
WantedBy=multi-user.target
EOF

systemctl daemon-reload
systemctl enable hestiacp-metrics.service
systemctl start hestiacp-metrics.service

# Configuration du firewall
ufw allow 22/tcp
ufw allow 80/tcp
ufw allow 443/tcp
ufw allow 8083/tcp
ufw allow 9100/tcp  # Node Exporter
ufw allow 8080/tcp  # HestiaCP Metrics
ufw --force enable

# Redémarrage des services
systemctl restart hestia
systemctl restart nginx
systemctl restart apache2

# Log de fin d'installation
echo "$(date): HestiaCP installation completed" >> /var/log/hestiacp-install.log