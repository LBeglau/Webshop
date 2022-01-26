FROM schwarzit-docker.jfrog.io/php:7.4.22-fpm

RUN apt-get update && apt-get install -y \
        apt-utils \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libzip-dev \
        zlib1g-dev \
        libicu-dev \
        libxslt-dev \
        unzip \
        zip \
        wget \
        g++ \
        supervisor
# install all php related extensions
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

# installing and configuring extensions
RUN install-php-extensions bcmath
RUN install-php-extensions calendar
RUN install-php-extensions exif
RUN install-php-extensions iconv
RUN install-php-extensions intl
RUN install-php-extensions gd && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN install-php-extensions hash && docker-php-ext-configure hash --with-mhash
RUN install-php-extensions opcache
#RUN install-php-extensions pcov
RUN install-php-extensions pdo
RUN install-php-extensions pdo_mysql
#RUN install-php-extensions redis
RUN install-php-extensions xsl
#RUN install-php-extensions xdebug
#RUN install-php-extensions zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin/ --filename=composer
RUN  php -r "unlink('composer-setup.php');"
#RUN curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
#RUN  chmod a+x /usr/local/bin/symfony
RUN  chown -R www-data:www-data /var/www/html
RUN  echo "xdebug.idekey=xdebug-base" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    # Xdebug 2
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_log=/usr/local/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    # Xdebug 3
    && echo "xdebug.log=/usr/local/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.discover_client_host=true" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# added all relevant root certificates - exported from mac osx keychain
#ADD certificates /usr/local/share/ca-certificates
#RUN update-ca-certificates

RUN groupadd -g 1010 deploy && useradd -u 1010 -m -r -g deploy deploy \
    && chown -R deploy:deploy /var/www/html
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get update && apt-get install -y nodejs
#RUN npm install -g yarn
#RUN npm install -g grunt-cli
#RUN apt-get install -y git
#RUN apt-get install -y libldap2-dev
#RUN docker-php-ext-install -j$(nproc) calendar

# add cloud-foundry cli
#RUN curl -L "https://packages.cloudfoundry.org/stable?release=linux64-binary&version=v7&source=github" | tar -zx \
 # && mv cf7 /bin \
  #&& mv cf /bin

HEALTHCHECK CMD php -v || exit 1
