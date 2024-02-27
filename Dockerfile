FROM php:8.2.16-apache-bookworm as composer

WORKDIR /app

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY --chown=www-data:www-data ./ /app/

RUN composer install --no-dev


FROM php:8.2.16-apache-bookworm

WORKDIR /tmp

ARG WORDPRESS_VERSION

RUN apt-get update \
    && apt-get install -y \
        libjpeg-dev \
        libpng-dev \
        libzip-dev \
        unzip \
        zlib1g-dev \
    && docker-php-ext-install \
      gd \
      mysqli \
      opcache \
      zip \
    && a2enmod \
      rewrite \
      expires \
      mpm_prefork \
      headers \
    && curl "https://wordpress.org/wordpress-${WORDPRESS_VERSION}.zip" \
        -o wordpress-${WORDPRESS_VERSION}.zip \
    && unzip -q wordpress-${WORDPRESS_VERSION}.zip \
    && rm wordpress-${WORDPRESS_VERSION}.zip \
    && mv ./wordpress/* /var/www/html/ \
    && chown -R www-data:www-data /var/www/html/ \
    && rm -rf /var/www/html/wp-content/plugins/akismet/ \
    && rm /var/www/html/wp-content/plugins/hello.php \
    && rm -rf /var/www/html/wp-content/themes/twentytwentythree/ \
    && rm -rf /var/www/html/wp-content/themes/twentytwentytwo/ \
    && curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && php wp-cli.phar --info \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp \
    && apt-get purge -y --auto-remove \
        -o APT::AutoRemove::RecommendsImportant=false \
    && rm -rf /var/lib/apt/lists/*

COPY ./docker/vhost.conf /etc/apache2/sites-enabled/000-default.conf
COPY ./docker/php.ini /usr/local/etc/php/php.ini
COPY --chown=www-data:www-data ./docker/wp-setup.sh /app/docker/wp-setup.sh

COPY --chown=www-data:www-data ./docker/wp-config.php /var/www/html/wp-config.php

COPY --chown=www-data:www-data ./plugin.php ./composer.json ./composer.lock /var/www/html/wp-content/plugins/wp-choice-login/
COPY --chown=www-data:www-data ./src/ /var/www/html/wp-content/plugins/wp-choice-login/src/
COPY --chown=www-data:www-data --from=composer /app/vendor/ /var/www/html/wp-content/plugins/wp-choice-login/vendor/

WORKDIR /var/www/html
