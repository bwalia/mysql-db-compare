ARG BASE_TAG=latest

FROM bwalia/openresty-php:$BASE_TAG

WORKDIR /var/www/html

RUN apk update && apk upgrade \
     jq

RUN mkdir -p /var/www/html/public

COPY /web /var/www/html/public/

COPY ./config/vhosts/mysql-db-compare.conf /etc/nginx/sites-enabled/mysql-db-compare.conf
COPY ./config/vhosts/nginx.conf /usr/local/openresty/nginx/conf/nginx.conf
