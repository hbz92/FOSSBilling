#!/bin/bash

# FOSSBilling MFA Module Installation Script
# This script installs the Multi-Factor Authentication module for FOSSBilling

set -e

echo "🔐 FOSSBilling MFA Module Installation Script"
echo "=============================================="

# Check if we're in the right directory
if [ ! -f "composer.json" ]; then
    echo "❌ Error: composer.json not found. Please run this script from the FOSSBilling root directory."
    exit 1
fi

# Check if PHP is available
if ! command -v php &> /dev/null; then
    echo "❌ Error: PHP is not installed or not in PATH."
    exit 1
fi

# Check if Composer is available
if ! command -v composer &> /dev/null; then
    echo "❌ Error: Composer is not installed or not in PATH."
    echo "Please install Composer first: https://getcomposer.org/download/"
    exit 1
fi

echo "📦 Installing robthree/twofactorauth dependency..."
composer require robthree/twofactorauth

echo "📁 Creating module directory structure..."
mkdir -p src/modules/Mfa/{Api,Controller,html_client,html_admin,install/sql}

echo "✅ Module structure created successfully!"

echo "🗄️  Installing database tables..."
if [ -f "src/modules/Mfa/install/sql/mfa_tables.sql" ]; then
    echo "Please run the following SQL commands in your database:"
    echo "----------------------------------------"
    cat src/modules/Mfa/install/sql/mfa_tables.sql
    echo "----------------------------------------"
    echo ""
    echo "Or import the file directly:"
    echo "mysql -u username -p database_name < src/modules/Mfa/install/sql/mfa_tables.sql"
else
    echo "❌ Error: SQL file not found. Please check the module installation."
    exit 1
fi

echo ""
echo "🎉 Installation completed successfully!"
echo ""
echo "Next steps:"
echo "1. Import the SQL file into your database"
echo "2. Activate the module in FOSSBilling admin panel"
echo "3. Configure MFA settings in the admin panel"
echo "4. Test the MFA functionality"
echo ""
echo "For more information, see: src/modules/Mfa/README.md"
echo ""
echo "🔐 Your FOSSBilling installation now supports Multi-Factor Authentication!"