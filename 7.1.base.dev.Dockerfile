FROM php:7.1-fpm

ARG TIME_ZONE=Europe/Moscow
ENV TZ=${TIME_ZONE}


RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime && echo ${TZ} > /etc/timezone \
    && apt-get update \
    && mkdir -p /usr/share/man/man1 \
    && mkdir -p /usr/share/man/man7 \
    && mkdir -p /usr/share/man/man8 \
    && apt-get install -y --no-install-recommends \
        autoconf \
        curl \
        g++ \
        gcc \
        git \
        inetutils-ping \
        libc-dev \
        libicu-dev \
        libxml2-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libzip-dev \
        libmemcached11 \
        libmemcachedutil2 \
        libmemcached-dev \
        libmagickwand-dev \
        default-mysql-client \
        imagemagick \
        libz-dev \
        make \
        memcached \
        pkg-config \
        tzdata \
        unzip \
        wget \
        zlib1g-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) \
        curl \
        gd \
        iconv \
        mcrypt \
        fileinfo \
        json \
        mbstring \
        opcache \
        pdo \
        pdo_mysql \
        zip \
        intl \
        dom \
        session \
        xml \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install xdebug-2.9.8 \
    && docker-php-ext-enable \
    xdebug

COPY ./php/php.ini ${PHP_INI_DIR}/php.ini
COPY ./php/xdebug.ini ${PHP_INI_DIR}/conf.d/xdebug.ini

WORKDIR /var/www/html/renat

CMD ["php-fpm"]


#bcmath bz2 calendar ctype curl dba dom enchant exif fileinfo filter ftp gd gettext gmp hash iconv imap interbase intl json ldap mbstring mcrypt mysqli oci8 odbc opcache pcntl pdo pdo_dblib pdo_firebird pdo_mysql pdo_oci pdo_odbc pdo_pgsql pdo_sqlite pgsql phar posix pspell readline recode reflection session shmop simplexml snmp soap sockets spl standard sysvmsg sysvsem sysvshm tidy tokenizer wddx xml xmlreader xmlrpc xmlwriter xsl zip

# Build commands
# docker build --no-cache -f 7.1.base.dev.Dockerfile -t renat/php-fpm-7.1-xdebug-mysql:base .
# docker build -f 7.1.base.dev.Dockerfile -t renat/php-fpm-7.1-xdebug-mysql:base .