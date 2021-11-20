FROM php:8.0.12-apache-buster
RUN apt-get update \
    && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        git \
        zip \
        unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli pdo pdo_mysql opcache zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
# Install XDebug.  If you do not want XDebug, you can comment out the next line
RUN pecl install xdebug-3.1.1 \
    && docker-php-ext-enable xdebug
# Use the development configuration by default
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"     
# PHP Extensions and configuration modifications.
# Edit the /php/conf.d/local.ini file to override basic php.ini settings.
COPY /php/conf.d/* $PHP_INI_DIR/conf.d/
# Add Composer
COPY --from=composer:2.0 /usr/bin/composer /usr/local/bin/composer
# Apache configuration
COPY /apache/conf/project-site.conf /etc/apache2/sites-available/project-site.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
    a2enmod ssl &&\
    a2enmod rewrite &&\
    a2dissite 000-default &&\
    a2ensite project-site

