#!/bin/bash
# Move to root
cd ..
# Download composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
cd ./root
# Install Zend Expressive
php composer.phar create-project zendframework/zend-expressive-skeleton api
# Install Dependencies
php composer.phar require dasprid/container-interop-doctrine
php composer.phar require doctrine/migrations
php composer.phar require lcobucci/jwt
php composer.phar require monolog/monolog
php composer.phar require zendframework/zend-authentication
php composer.phar require zendframework/zend-barcode
php composer.phar require zendframework/zend-crypt
php composer.phar require zendframework/zend-form
php composer.phar require zendframework/zend-json
php composer.phar require zendframework/zend-mail
php composer.phar require zendframework/zend-permissions-acl
php composer.phar require zendframework/zend-paginator
php composer.phar require zendframework/zend-serializer