ARG php_version
ARG project_hostname

FROM php:$php_version

ARG project_hostname
ENV PROJECT_HOSTNAME ${project_hostname}

WORKDIR /var/www/vhosts/$project_hostname

COPY ./wait-for.sh /tmp/wait-for.sh
RUN chmod +x /tmp/wait-for.sh

RUN apk update
RUN apk add \
    bash \
    git \
    gettext \
    libintl \
    netcat-openbsd \
    libzip-dev

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-configure zip --with-libzip=/usr/include && docker-php-ext-install zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

COPY ./templates/init.template /tmp/init.template
RUN envsubst < /tmp/init.template > /tmp/init.sh
RUN chmod +x /tmp/init.sh

ENV TZ="Europe/Brussels"
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
