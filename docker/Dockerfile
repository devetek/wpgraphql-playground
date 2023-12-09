FROM composer:latest AS env-build

COPY composer.* /app/

RUN set -xe \
    && composer install --no-dev --no-scripts --no-suggest --no-interaction --prefer-dist --optimize-autoloader \
    && composer dump-autoload --no-dev --optimize --classmap-authoritative

FROM wordpress:6.4.1

# Test purpose, to build wordpress patch with postgresql databse
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_mysql mysqli \
    && docker-php-ext-enable pdo_mysql

# preset runtime environment 
COPY ./config/php.conf.ini /usr/local/etc/php/conf.d/conf.ini
COPY .htaccess .
COPY .env.example .
COPY composer.json .
COPY composer.lock .
COPY wp-config.php .
COPY --from=env-build /app/vendor /var/www/html/vendor