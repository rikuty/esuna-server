#!/bin/bash
echo "cd"
cd /var/www/html

echo "git pull"
/usr/bin/git pull origin master

echo "composer install"
/bin/composer install

echo "systemctl reload httpd"
systemctl reload httpd

