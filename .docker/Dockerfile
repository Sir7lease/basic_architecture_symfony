FROM php:8.2-apache

# opcache
RUN docker-php-ext-install opcache

COPY opcache.ini $PHP_INI_DIR/conf.d/opcache.ini

# Apache Configuration
RUN a2enmod rewrite

COPY /vhosts /etc/apache2/sites-available

# SSL
RUN a2enmod ssl && \
    a2ensite 000-default-ssl && \
    openssl req -subj '/CN=example.com/O=My Company Name LTD./C=US' -new -newkey rsa:2048 -days 365 -nodes -x509 -keyout /etc/ssl/private/ssl-cert.key -out /etc/ssl/certs/ssl-cert.pem

# xDebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=develop,debug" >> $PHP_INI_DIR/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> $PHP_INI_DIR/conf.d/docker-php-ext-xdebug.ini


RUN apt-get -y update \
&& apt-get install -y libicu-dev \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl


RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www