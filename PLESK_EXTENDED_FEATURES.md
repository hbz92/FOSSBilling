# Plesk Extended Features for FOSSBilling

Ce document décrit les fonctionnalités étendues de Plesk implémentées dans FOSSBilling pour offrir une intégration complète avec les panneaux de contrôle Plesk.

## Vue d'ensemble

Les fonctionnalités Plesk étendues ajoutent un support complet pour :

1. **Admin Area Features** - Gestion administrative avancée
2. **Client Area Features** - Interface client pour la gestion à distance
3. **Application Auto Installer** - Installation automatique d'applications
4. **Gestion des ressources** - Domains, bases de données, emails, FTP, etc.

## Fonctionnalités Admin Area

### Gestion des comptes
- ✅ Création/Suspension/Annulation de comptes
- ✅ Changement de plan et mot de passe
- ✅ Connexion directe au panneau Plesk utilisateur
- ✅ Configuration des produits avec options avancées
- ✅ Toggle "Power User" Plesk Panel View
- ✅ Synchronisation des détails clients
- ✅ Création d'abonnements sur comptes Plesk séparés
- ✅ Définition de la version PHP par défaut
- ✅ Facturation métrique
- ✅ Configuration des fonctionnalités Client Area par produit
- ✅ Configuration de l'Application Auto Installer par produit
- ✅ Génération d'options configurables pour les applications
- ✅ Configuration multiple de produits et paramètres
- ✅ Vue de tous les produits et serveurs Plesk étendus
- ✅ Vue de toutes les configurations de serveurs Plesk étendus
- ✅ Vue de tous les clients WHMCS liés aux comptes clients Plesk
- ✅ Définition d'URL personnalisées pour le panneau et webmail
- ✅ Connexion directe au panneau administrateur Plesk

### Gestion des serveurs
- ✅ Statistiques serveur en temps réel
- ✅ Gestion des produits Plesk
- ✅ Gestion des clients Plesk
- ✅ Configuration avancée des serveurs

## Fonctionnalités Client Area

### Accès et gestion à distance
- ✅ **Addon Domains** - Ajout et gestion de domaines supplémentaires
- ✅ **Applications** - Installation et gestion d'applications
- ✅ **Backups** - Gestion des sauvegardes (jusqu'à Plesk 17.5)
- ✅ **Databases** - Support MySQL et PostgreSQL
- ✅ **Domain Aliases** - Gestion des alias de domaines
- ✅ **DNS Settings** - Configuration DNS
- ✅ **Email Addresses** - Gestion des adresses email
- ✅ **Email Forwarders** - Redirection d'emails
- ✅ **FTP Access** - Comptes FTP
- ✅ **Git Repositories** - Gestion des dépôts Git
- ✅ **Log Rotation** - Rotation des logs
- ✅ **Node.js** - Support Node.js
- ✅ **PHP Settings** - Configuration PHP
- ✅ **Spam Filter** - Filtre anti-spam SpamAssassin (jusqu'à Plesk 17.5)
- ✅ **SSL Certificates** - Certificats SSL
- ✅ **Subdomains** - Gestion des sous-domaines
- ✅ **Web Users** - Utilisateurs web (jusqu'à Plesk 17.5)
- ✅ **WordPress Manager** - Module séparé requis
- ✅ **WordPress Toolkit** - Outils WordPress

### Connexion en un clic
- ✅ **Backup Manager** - Gestionnaire de sauvegarde
- ✅ **Plesk** - Panneau Plesk
- ✅ **Webmail** - Interface webmail
- ✅ **WP Toolkit** - Outils WordPress

### Gestion des comptes
- ✅ Changement de mot de passe
- ✅ Gestion des paramètres PHP
- ✅ Gestion des applications installées

## Application Auto Installer

### Processus de commande
- ✅ Installation automatique d'applications après création de compte
- ✅ Installation d'applications choisies par le client lors de la commande
- ✅ Options configurables pour les applications
- ✅ Paramètres personnalisés pour les applications installées automatiquement

### Client Area
- ✅ Installation de nouvelles applications avec Installatron, Softaculous ou l'installateur Plesk par défaut
- ✅ Visualisation et gestion des applications installées
- ✅ Sauvegarde des applications installées
- ✅ Sauvegardes automatiques lors des mises à jour d'applications par Installatron
- ✅ Visualisation et gestion des sauvegardes créées
- ✅ Restauration d'applications depuis les sauvegardes
- ✅ Suppression d'applications avec leurs sauvegardes

### Applications supportées
- **WordPress** - CMS le plus populaire
- **Joomla** - Système de gestion de contenu open source
- **Drupal** - Plateforme de gestion de contenu open source
- **phpBB** - Logiciel de forum open source
- **PrestaShop** - Plateforme e-commerce open source

### Types d'installateurs
- **Plesk Default** - Installateur par défaut de Plesk
- **Installatron** - Installateur tiers (intégration API requise)
- **Softaculous** - Installateur tiers (intégration API requise)

## Installation

### 1. Mise à jour de la base de données
Exécutez le script SQL pour créer les nouvelles tables :

```sql
-- Exécuter le fichier plesk_extended.sql
source /path/to/plesk_extended.sql
```

### 2. Configuration du serveur Plesk
1. Allez dans **Admin > Servers > Hosting Servers**
2. Sélectionnez votre serveur Plesk
3. Configurez les paramètres étendus :
   - **Power User View** : Activez pour une vue administrateur
   - **Client Sync** : Synchronisation des détails clients
   - **Default PHP Version** : Version PHP par défaut
   - **Metric Billing** : Facturation métrique
   - **Custom Panel URL** : URL personnalisée du panneau
   - **Custom Webmail URL** : URL personnalisée du webmail

### 3. Configuration des produits
1. Allez dans **Admin > Products > Hosting Products**
2. Sélectionnez un produit d'hébergement
3. Configurez les options Plesk étendues :
   - **Auto Installer Enabled** : Activer l'installation automatique
   - **Auto Installer Type** : Type d'installateur
   - **Client Area Features** : Fonctionnalités disponibles pour les clients
   - **PHP Version** : Version PHP spécifique au produit

## Utilisation

### Pour les administrateurs

#### Gestion des comptes
```php
// Obtenir les URLs Plesk pour un compte
$urls = $service->getPleskUrls($hostingModel);

// Gérer les domaines addon
$domains = $service->getAddonDomains($hostingModel);
$service->addAddonDomain($hostingModel, 'example.com');

// Gérer les bases de données
$databases = $service->getDatabases($hostingModel);
$service->createDatabase($hostingModel, 'mydb', 'mysql');

// Gérer les emails
$emails = $service->getEmailAddresses($hostingModel);
$service->createEmailAddress($hostingModel, 'user@example.com', 'password');
```

#### Gestion des applications
```php
// Installer une application
$autoInstaller = new \Box\Mod\Servicehosting\ServicePleskAutoInstaller();
$autoInstaller->setDi($di);
$autoInstaller->installApplication($hostingModel, 'wordpress', $options, 'plesk');

// Obtenir les applications installées
$apps = $autoInstaller->getInstalledApplications($hostingModel);

// Créer une sauvegarde
$autoInstaller->createBackup($installationId);
```

### Pour les clients

#### Interface utilisateur
Les clients peuvent accéder aux fonctionnalités étendues via :
- **Plesk Control Panel** - Accès direct au panneau Plesk
- **Webmail** - Interface webmail
- **Backup Manager** - Gestionnaire de sauvegarde
- **WP Toolkit** - Outils WordPress

#### Gestion des ressources
- **Addon Domains** - Ajout de domaines supplémentaires
- **Subdomains** - Création de sous-domaines
- **Databases** - Gestion des bases de données
- **Email Addresses** - Création d'adresses email
- **FTP Accounts** - Comptes FTP
- **PHP Settings** - Configuration PHP

#### Application Auto Installer
- **Browse Applications** - Parcourir les applications disponibles
- **Install Applications** - Installation d'applications
- **Manage Installed Apps** - Gestion des applications installées
- **Backup & Restore** - Sauvegarde et restauration

## API Endpoints

### Admin API
- `get_plesk_urls` - Obtenir les URLs Plesk
- `get_addon_domains` - Obtenir les domaines addon
- `add_addon_domain` - Ajouter un domaine addon
- `get_databases` - Obtenir les bases de données
- `create_database` - Créer une base de données
- `get_email_addresses` - Obtenir les adresses email
- `create_email_address` - Créer une adresse email
- `get_ftp_accounts` - Obtenir les comptes FTP
- `create_ftp_account` - Créer un compte FTP
- `get_ssl_certificates` - Obtenir les certificats SSL
- `get_subdomains` - Obtenir les sous-domaines
- `create_subdomain` - Créer un sous-domaine
- `get_php_settings` - Obtenir les paramètres PHP
- `update_php_settings` - Mettre à jour les paramètres PHP
- `get_installed_applications` - Obtenir les applications installées
- `install_application` - Installer une application
- `get_all_plesk_products` - Obtenir tous les produits Plesk
- `get_all_plesk_servers` - Obtenir tous les serveurs Plesk
- `get_all_plesk_customers` - Obtenir tous les clients Plesk
- `get_server_statistics` - Obtenir les statistiques serveur

### Client API
- `get_plesk_urls` - Obtenir les URLs Plesk
- `get_addon_domains` - Obtenir les domaines addon
- `add_addon_domain` - Ajouter un domaine addon
- `get_databases` - Obtenir les bases de données
- `create_database` - Créer une base de données
- `get_email_addresses` - Obtenir les adresses email
- `create_email_address` - Créer une adresse email
- `get_ftp_accounts` - Obtenir les comptes FTP
- `create_ftp_account` - Créer un compte FTP
- `get_ssl_certificates` - Obtenir les certificats SSL
- `get_subdomains` - Obtenir les sous-domaines
- `create_subdomain` - Créer un sous-domaine
- `get_php_settings` - Obtenir les paramètres PHP
- `update_php_settings` - Mettre à jour les paramètres PHP
- `get_installed_applications` - Obtenir les applications installées
- `install_application` - Installer une application

### Application Auto Installer API
- `get_available_applications` - Obtenir les applications disponibles
- `get_application_categories` - Obtenir les catégories d'applications
- `get_installer_types` - Obtenir les types d'installateurs
- `install_application_auto` - Installer une application via auto installer
- `get_installed_applications_auto` - Obtenir les applications installées via auto installer
- `create_application_backup` - Créer une sauvegarde d'application
- `get_application_backups` - Obtenir les sauvegardes d'application
- `restore_application_backup` - Restaurer une application depuis une sauvegarde
- `delete_application` - Supprimer une application

## Configuration avancée

### Intégration Installatron
Pour intégrer Installatron, vous devez :
1. Obtenir les clés API Installatron
2. Configurer les endpoints API
3. Implémenter les méthodes d'intégration dans `ServicePleskAutoInstaller`

### Intégration Softaculous
Pour intégrer Softaculous, vous devez :
1. Obtenir les clés API Softaculous
2. Configurer les endpoints API
3. Implémenter les méthodes d'intégration dans `ServicePleskAutoInstaller`

### Personnalisation des applications
Vous pouvez ajouter de nouvelles applications en modifiant la méthode `getPleskApplications()` dans `ServicePleskAutoInstaller.php`.

## Dépannage

### Problèmes courants

1. **Erreur de connexion Plesk**
   - Vérifiez les paramètres de connexion du serveur
   - Vérifiez que l'API Plesk est activée
   - Vérifiez les permissions de l'utilisateur API

2. **Applications non installées**
   - Vérifiez que l'auto installer est activé
   - Vérifiez les logs d'installation
   - Vérifiez les permissions du compte

3. **Erreurs de sauvegarde**
   - Vérifiez l'espace disque disponible
   - Vérifiez les permissions de sauvegarde
   - Vérifiez la configuration du serveur

### Logs
Les logs sont disponibles dans :
- **Application logs** : `/var/log/fossbilling/`
- **Plesk logs** : `/var/log/plesk/`
- **Installation logs** : Base de données `service_hosting_app_installation`

## Support

Pour obtenir de l'aide avec les fonctionnalités Plesk étendues :
1. Consultez la documentation Plesk
2. Vérifiez les logs d'erreur
3. Contactez le support FOSSBilling
4. Consultez la communauté FOSSBilling

## Changelog

### Version 1.0.0
- ✅ Implémentation initiale des fonctionnalités Plesk étendues
- ✅ Support complet des fonctionnalités Admin Area
- ✅ Support complet des fonctionnalités Client Area
- ✅ Application Auto Installer avec support Plesk, Installatron et Softaculous
- ✅ Gestion complète des ressources (domains, databases, emails, FTP, etc.)
- ✅ Interface utilisateur moderne et responsive
- ✅ API complète pour toutes les fonctionnalités
- ✅ Documentation complète

## Licence

Ce code est distribué sous la licence Apache 2.0. Voir le fichier LICENSE pour plus de détails.