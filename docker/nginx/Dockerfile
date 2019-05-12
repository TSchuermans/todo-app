ARG nginx_version

FROM nginx:$nginx_version

ARG project_name
ENV PROJECT_NAME ${project_name}
ARG project_hostname
ENV PROJECT_HOSTNAME ${project_hostname}
ARG app_env
ENV APP_ENV ${app_env}
ARG app_secret
ENV APP_SECRET ${app_secret}
ARG ssl_country_name
ENV SSL_COUNTRY_NAME ${ssl_country_name}
ARG ssl_state_name
ENV SSL_STATE_NAME ${ssl_state_name}
ARG ssl_locality_name
ENV SSL_LOCALITY_NAME ${ssl_locality_name}
ARG ssl_organization_name
ENV SSL_ORGANIZATION_NAME ${ssl_organization_name}
ARG ssl_organizational_unit_name
ENV SSL_ORGANIZATIONAL_UNIT_NAME ${ssl_organizational_unit_name}
ARG ssl_email_address
ENV SSL_EMAIL_ADDRESS ${ssl_email_address}

RUN apk update
RUN apk add bash
RUN apk add openssl

RUN mkdir /ssl

COPY ./templates/config-ssl.template /tmp/config-ssl.template
COPY ./templates/generate-ssl.template /tmp/generate-ssl.template
COPY ./templates/vhost.template /tmp/vhost.template

RUN envsubst < /tmp/config-ssl.template > /tmp/config-ssl.txt
RUN envsubst < /tmp/generate-ssl.template > /tmp/generate-ssl.sh
RUN envsubst '${PROJECT_HOSTNAME},${PROJECT_NAME},${APP_ENV},${APP_SECRET}' < /tmp/vhost.template > /tmp/vhost.conf
RUN cp -f /tmp/vhost.conf /etc/nginx/conf.d/default.conf

RUN chmod +x /tmp/generate-ssl.sh

ENV TZ=Europe/Brussels
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
