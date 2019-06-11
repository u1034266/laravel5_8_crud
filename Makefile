initialize:
	@echo "==== Preparing environment ===="
	# @curl -sS https://getcomposer.org/installer | php
	@mv composer.phar /usr/local/bin/composer
	@chmod +x /usr/local/bin/composer
	@chmod 777 -R /var/www/html/storage/
	@composer install

reset_perms:
	@echo "==== Resetting file permissions ===="
	@chmod -R 777 /var/www/html/storage/
	@chmod -R 777 *
	
clear_cache:
	@echo "==== Preparing environment ===="
	@php artisan cache:clear
	@php artisan config:clear

install_db_deps: clear_cache
	@echo "==== Installing DB dependencies ===="
	@apk --no-cache add postgresql-dev
	@docker-php-ext-install pdo pdo_pgsql

install_npm:
	@echo "==== Installing nodejs / nodejs-npm ===="
	@apk add --update nodejs nodejs-npm
	@npm install