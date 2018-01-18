FROM phpearth/php:7.1-nginx

RUN apk add --no-cache composer git openssh composer \
    && composer global require hirak/prestissimo;

RUN apk add --no-cache \
    php7.1-gd \
    php7.1-imagick \
    php7.1-intl \
    php7-pdo_sqlite \
    php7-sqlite3 \
    php7.1-pdo_mysql \    
    php7.1-pdo_pgsql \
    php7-tidy \
    php7-xdebug