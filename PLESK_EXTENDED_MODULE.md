# Module Plesk Extended pour FOSSBilling

## Description

Le module Plesk Extended est un module complètement séparé de FOSSBilling qui étend les fonctionnalités de gestion Plesk sans interférer avec le module Servicehosting existant. Il fournit des fonctionnalités avancées de gestion Plesk, incluant l'auto-installation d'applications, la gestion à distance et des outils d'administration étendus.

## Fonctionnalités

### Admin Area Features

- **Gestion des comptes** : Création, suspension, annulation, changement de plan et mot de passe
- **Connexion directe** : Accès en un clic au panneau Plesk utilisateur et administrateur
- **Configuration des produits** : 
  - Nom du plan de service
  - Nom du plan revendeur
  - Types d'adresses IP
  - Toggle "Power User" Plesk Panel View
  - Synchronisation des détails clients
  - Création d'abonnements
  - Version PHP par défaut
  - Facturation métrique
  - Configuration des fonctionnalités Client Area par produit
- **Application Auto Installer** :
  - Installateur Plesk par défaut
  - Installatron
  - Softaculous
  - Options configurables pour les applications
  - Configuration multiple de produits et paramètres
- **Vue d'ensemble** :
  - Tous les produits et serveurs Plesk étendus
  - Toutes les configurations de serveurs Plesk étendus
  - Tous les clients WHMCS liés aux comptes clients Plesk
  - URL personnalisées pour le panneau et webmail

### Client Area Features

- **Gestion à distance de** :
  - Addon Domains
  - Applications
  - Backups (jusqu'à Plesk 17.5)
  - Databases (MySQL et PostgreSQL)
  - Domain Aliases
  - DNS Settings
  - Email Addresses
  - Email Forwarders
  - FTP Access
  - Git Repositories
  - Log Rotation
  - Node.js
  - PHP Settings
  - Spam Filter (jusqu'à Plesk 17.5)
  - SSL Certificates
  - Subdomains
  - Web Users (jusqu'à Plesk 17.5)
  - WordPress Manager (module séparé requis)
  - WordPress Toolkit
- **Connexion en un clic à** :
  - Backup Manager
  - Plesk
  - Webmail
  - WP Toolkit
- **Changement de mot de passe** de compte

### Application Auto Installer Features

- **Installation automatique** d'applications après création de compte
- **Installation d'applications** choisies par le client lors de la commande
- **Options configurables** pour les applications
- **Paramètres personnalisés** pour les applications installées automatiquement
- **Client Area** :
  - Installation de nouvelles applications (Installatron, Softaculous, Installateur Plesk par défaut)
  - Visualisation et gestion des applications installées
  - Sauvegarde des applications installées
  - Sauvegardes automatiques lors des mises à jour par Installatron
  - Visualisation et gestion des sauvegardes créées
  - Restauration d'applications depuis les sauvegardes
  - Suppression d'applications avec leurs sauvegardes

## Installation

### Prérequis

- FOSSBilling 1.0.0 ou supérieur
- PHP 8.1.0 ou supérieur
- Plesk 18.0.0 ou supérieur
- Module Servicehosting activé

### Étapes d'installation

1. **Copier les fichiers du module** :
   ```bash
   cp -r src/modules/Pleskextended /path/to/fossbilling/src/modules/
   ```

2. **Exécuter le script SQL** :
   ```bash
   mysql -u username -p database_name < src/install/sql/plesk_extended.sql
   ```

3. **Activer le module** dans l'interface d'administration FOSSBilling

4. **Configurer les serveurs Plesk** avec les nouvelles options étendues

### Configuration

#### Configuration du serveur Plesk

1. Aller dans **Administration > Serveurs**
2. Sélectionner un serveur Plesk existant ou en créer un nouveau
3. Configurer les options étendues :
   - **Power User Panel View** : Active la vue utilisateur avancée
   - **Client Details Synchronization** : Synchronise les détails clients
   - **Default PHP Version** : Version PHP par défaut
   - **Metric Billing** : Active la facturation métrique
   - **Custom Panel URL** : URL personnalisée pour le panneau
   - **Custom Webmail URL** : URL personnalisée pour webmail
   - **Auto Installer Enabled** : Active l'auto-installateur d'applications
   - **Auto Installer Type** : Type d'auto-installateur (Plesk, Installatron, Softaculous)

#### Configuration des produits

1. Aller dans **Administration > Produits**
2. Sélectionner un produit d'hébergement
3. Configurer les options Plesk Extended :
   - **Service Plan Name** : Nom du plan de service Plesk
   - **Reseller Plan Name** : Nom du plan revendeur
   - **IP Address Type** : Type d'adresse IP (partagée/exclusive)
   - **Power User View** : Vue utilisateur avancée
   - **Client Sync** : Synchronisation des détails clients
   - **Default PHP Version** : Version PHP par défaut
   - **Metric Billing** : Facturation métrique
   - **Auto Installer** : Configuration de l'auto-installateur
   - **Client Area Features** : Fonctionnalités disponibles pour les clients

## Utilisation

### Interface Client

1. **Accéder au service** : Aller dans **Mes Services** et sélectionner un service Plesk
2. **Gestion des domaines** : Ajouter des domaines addon et sous-domaines
3. **Gestion des bases de données** : Créer et gérer des bases de données MySQL/PostgreSQL
4. **Gestion des emails** : Créer et gérer des adresses email
5. **Gestion FTP** : Créer et gérer des comptes FTP
6. **Certificats SSL** : Visualiser les certificats SSL
7. **Paramètres PHP** : Configurer les paramètres PHP
8. **Applications** : Installer et gérer des applications

### Interface Admin

1. **Vue d'ensemble** : Statistiques des serveurs et services
2. **Gestion des produits** : Configuration des produits Plesk
3. **Gestion des serveurs** : Monitoring des serveurs Plesk
4. **Gestion des clients** : Visualisation des clients Plesk
5. **Applications** : Gestion des applications disponibles
6. **Paramètres** : Configuration globale du module

## API Endpoints

### Client API

- `get_plesk_urls` : Obtenir les URLs Plesk
- `get_addon_domains` : Lister les domaines addon
- `add_addon_domain` : Ajouter un domaine addon
- `get_databases` : Lister les bases de données
- `create_database` : Créer une base de données
- `get_email_addresses` : Lister les adresses email
- `create_email_address` : Créer une adresse email
- `get_ftp_accounts` : Lister les comptes FTP
- `create_ftp_account` : Créer un compte FTP
- `get_ssl_certificates` : Lister les certificats SSL
- `get_subdomains` : Lister les sous-domaines
- `create_subdomain` : Créer un sous-domaine
- `get_php_settings` : Obtenir les paramètres PHP
- `update_php_settings` : Mettre à jour les paramètres PHP
- `get_available_applications` : Lister les applications disponibles
- `install_application_auto` : Installer une application
- `get_installed_applications_auto` : Lister les applications installées
- `create_application_backup` : Créer une sauvegarde d'application
- `get_application_backups` : Lister les sauvegardes d'applications
- `restore_application_backup` : Restaurer une sauvegarde d'application
- `delete_application` : Supprimer une application

### Admin API

- Tous les endpoints Client plus :
- `get_all_plesk_products` : Lister tous les produits Plesk
- `get_all_plesk_servers` : Lister tous les serveurs Plesk
- `get_all_plesk_customers` : Lister tous les clients Plesk
- `get_server_statistics` : Obtenir les statistiques du serveur

## Base de données

### Tables créées

- `service_hosting_app_installation` : Installations d'applications
- `service_hosting_app_backup` : Sauvegardes d'applications
- `service_hosting_plesk_config` : Configuration Plesk
- `service_hosting_plesk_product_config` : Configuration des produits Plesk

### Modèles RedBeanPHP

- `Model_ServiceHostingAppInstallation` : Modèle pour les installations d'applications
- `Model_ServiceHostingAppBackup` : Modèle pour les sauvegardes d'applications
- `Model_ServiceHostingPleskConfig` : Modèle pour la configuration Plesk
- `Model_ServiceHostingPleskProductConfig` : Modèle pour la configuration des produits

## Applications supportées

- **WordPress** : Système de gestion de contenu
- **Joomla** : Système de gestion de contenu open source
- **Drupal** : Plateforme de gestion de contenu flexible
- **phpBB** : Logiciel de forum open source
- **PrestaShop** : Plateforme e-commerce open source

## Sécurité

- Toutes les communications avec Plesk utilisent HTTPS
- Les mots de passe sont chiffrés
- Validation des entrées utilisateur
- Gestion des erreurs sécurisée
- Logs d'audit pour toutes les actions

## Dépannage

### Problèmes courants

1. **Erreur de connexion Plesk** :
   - Vérifier les paramètres de connexion
   - Vérifier que le serveur Plesk est accessible
   - Vérifier les certificats SSL

2. **Applications non installées** :
   - Vérifier que l'auto-installateur est activé
   - Vérifier les permissions du compte
   - Vérifier les logs d'erreur

3. **Erreurs de base de données** :
   - Vérifier que les tables sont créées
   - Vérifier les permissions de base de données
   - Vérifier la configuration RedBeanPHP

### Logs

Les logs sont disponibles dans :
- `/var/log/fossbilling/plesk_extended.log`
- Logs Plesk : `/usr/local/psa/admin/logs/`

## Support

Pour obtenir de l'aide :
1. Consulter la documentation FOSSBilling
2. Vérifier les logs d'erreur
3. Contacter le support technique

## Changelog

### Version 1.0.0
- Version initiale
- Support complet des fonctionnalités Plesk étendues
- Application Auto Installer
- Interface utilisateur moderne
- API complète
- Documentation complète

## Licence

Ce module est distribué sous la licence Apache 2.0, identique à FOSSBilling.

## Contribution

Les contributions sont les bienvenues ! Veuillez :
1. Fork le projet
2. Créer une branche pour votre fonctionnalité
3. Commiter vos changements
4. Pousser vers la branche
5. Ouvrir une Pull Request

## Auteurs

- FOSSBilling Team
- Contributeurs de la communauté

## Remerciements

- Équipe Plesk pour l'API
- Communauté FOSSBilling
- Contributeurs open source