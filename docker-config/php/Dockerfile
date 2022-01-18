FROM php:7.4.7-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        zlib1g-dev \
        libicu-dev \
        libxslt-dev \
        libzip-dev \
        unzip \
        zip \
        g++ \
        supervisor \
        gnupg \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-configure intl \
    && docker-php-ext-configure hash --with-mhash \
    && pecl install redis xdebug \
    && docker-php-ext-install -j$(nproc) opcache zip bcmath intl iconv pdo pdo_mysql gd xsl zip exif \
    && docker-php-ext-enable redis xdebug \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin/ --filename=composer \
    && php -r "unlink('composer-setup.php');" \
    && curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony \
    && chmod a+x /usr/local/bin/symfony \
    && chown -R www-data:www-data /var/www/html
RUN groupadd -g 1010 deploy && useradd -u 1010 -m -r -g deploy deploy \
    && chown -R deploy:deploy /var/www/html
RUN curl -sL https://deb.nodesource.com/setup_11.x | bash - \
    && apt-get install -y nodejs
RUN npm install -g yarn
RUN npm install -g grunt-cli
RUN apt-get install -y git
RUN apt-get install -y libldap2-dev
RUN docker-php-ext-configure ldap  --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install -j$(nproc) ldap
RUN docker-php-ext-install -j$(nproc) calendar