#!/usr/bin/env python3
"""
HestiaCP Metrics Exporter pour Prometheus
Collecte les métriques spécifiques à HestiaCP
"""

import os
import sys
import json
import subprocess
import time
from prometheus_client import start_http_server, Gauge, Counter, Info
from flask import Flask, jsonify

# Métriques Prometheus
hestiacp_users_count = Gauge('hestiacp_users_count', 'Number of users on HestiaCP')
hestiacp_domains_count = Gauge('hestiacp_domains_count', 'Number of domains on HestiaCP')
hestiacp_databases_count = Gauge('hestiacp_databases_count', 'Number of databases on HestiaCP')
hestiacp_emails_count = Gauge('hestiacp_emails_count', 'Number of email accounts on HestiaCP')
hestiacp_ssl_certificates = Gauge('hestiacp_ssl_certificates', 'Number of SSL certificates')
hestiacp_backups_count = Gauge('hestiacp_backups_count', 'Number of backups')
hestiacp_system_info = Info('hestiacp_system_info', 'HestiaCP system information')

class HestiaCPMetricsExporter:
    def __init__(self):
        self.hestia_path = '/usr/local/hestia/bin/'
        
    def run_hestia_command(self, command):
        """Exécute une commande HestiaCP et retourne le résultat"""
        try:
            result = subprocess.run(
                [f"{self.hestia_path}{command}"],
                capture_output=True,
                text=True,
                check=True
            )
            return result.stdout.strip()
        except subprocess.CalledProcessError as e:
            print(f"Erreur commande HestiaCP: {e}")
            return None
    
    def get_users_count(self):
        """Récupère le nombre d'utilisateurs"""
        result = self.run_hestia_command('v-list-users')
        if result:
            lines = result.split('\n')
            # Compter les lignes non vides (sauf l'en-tête)
            count = len([line for line in lines if line.strip() and not line.startswith('USER')])
            return count
        return 0
    
    def get_domains_count(self):
        """Récupère le nombre de domaines"""
        result = self.run_hestia_command('v-list-domains')
        if result:
            lines = result.split('\n')
            count = len([line for line in lines if line.strip() and not line.startswith('DOMAIN')])
            return count
        return 0
    
    def get_databases_count(self):
        """Récupère le nombre de bases de données"""
        result = self.run_hestia_command('v-list-databases')
        if result:
            lines = result.split('\n')
            count = len([line for line in lines if line.strip() and not line.startswith('DATABASE')])
            return count
        return 0
    
    def get_emails_count(self):
        """Récupère le nombre de comptes email"""
        result = self.run_hestia_command('v-list-mail-accounts')
        if result:
            lines = result.split('\n')
            count = len([line for line in lines if line.strip() and not line.startswith('ACCOUNT')])
            return count
        return 0
    
    def get_ssl_certificates_count(self):
        """Récupère le nombre de certificats SSL"""
        result = self.run_hestia_command('v-list-ssl-cert')
        if result:
            lines = result.split('\n')
            count = len([line for line in lines if line.strip() and not line.startswith('CERTIFICATE')])
            return count
        return 0
    
    def get_backups_count(self):
        """Récupère le nombre de sauvegardes"""
        result = self.run_hestia_command('v-list-backups')
        if result:
            lines = result.split('\n')
            count = len([line for line in lines if line.strip() and not line.startswith('BACKUP')])
            return count
        return 0
    
    def get_system_info(self):
        """Récupère les informations système HestiaCP"""
        version = self.run_hestia_command('v-list-sys-info')
        if version:
            return {
                'version': version.split('\n')[0] if version else 'unknown',
                'os': os.uname().sysname,
                'hostname': os.uname().nodename
            }
        return {'version': 'unknown', 'os': 'unknown', 'hostname': 'unknown'}
    
    def collect_metrics(self):
        """Collecte toutes les métriques"""
        # Métriques de comptage
        hestiacp_users_count.set(self.get_users_count())
        hestiacp_domains_count.set(self.get_domains_count())
        hestiacp_databases_count.set(self.get_databases_count())
        hestiacp_emails_count.set(self.get_emails_count())
        hestiacp_ssl_certificates.set(self.get_ssl_certificates_count())
        hestiacp_backups_count.set(self.get_backups_count())
        
        # Informations système
        system_info = self.get_system_info()
        hestiacp_system_info.info(system_info)

def main():
    exporter = HestiaCPMetricsExporter()
    
    # Collecte initiale
    exporter.collect_metrics()
    
    # Démarre le serveur Prometheus sur le port 8080
    start_http_server(8080)
    print("HestiaCP Metrics Exporter démarré sur le port 8080")
    
    # Collecte périodique des métriques
    while True:
        time.sleep(30)  # Collecte toutes les 30 secondes
        exporter.collect_metrics()

if __name__ == '__main__':
    main()