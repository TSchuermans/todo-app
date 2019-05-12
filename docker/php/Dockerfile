ARG php_version

FROM php:$php_version

ARG project_hostname

WORKDIR "/var/www/vhosts/${project_hostname}"

RUN apk update
RUN apk add \
    bash \
    git
RUN docker-php-ext-install pdo_mysql
