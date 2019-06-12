initialize:
	@echo "==== Preparing environment ===="
	@curl -sS https://getcomposer.org/installer | php
	@mv composer.phar /usr/local/bin/composer
	@chmod +x /usr/local/bin/composer
	@chmod 777 -R /var/www/html/storage/
	@composer install

reset_perms:
	@echo "==== Resetting file permissions ===="
	@chmod 777 -R /var/www/html/storage/
	@chmod 777 -R *
	
clear_cache:
	@echo "==== Preparing environment ===="
	@php artisan cache:clear
	# @php artisan config:clear

install_db_deps:
	@echo "==== Installing DB dependencies ===="
	@apk --no-cache add postgresql-dev
	@docker-php-ext-install pdo pdo_pgsql pdo_mysql

install_npm:
	@echo "==== Installing nodejs / nodejs-npm ===="
	@apk add --update nodejs nodejs-npm
	@npm install

# Note: Installs pdo_mysql only
install_pdo_mysql:
	@echo "==== Istalling pdo_mysql only ===="
	@docker-php-ext-install pdo pdo_mysql