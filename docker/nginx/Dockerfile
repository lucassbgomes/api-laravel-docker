FROM nginx:alpine
LABEL br.com.builderall.version="1.0"
LABEL br.com.builderall.description="Nginx API in Laravel"
LABEL br.com.builderall.maintainer="Lucas S.B Gomes, Rogério M. de Queiroz"
LABEL br.com.builderall.vendor="BuilderAll - Devs Gurupi-TO"

COPY nginx.conf /etc/nginx/

# If you're in China, or you need to change sources, will be set CHANGE_SOURCE to true in .env.

ARG CHANGE_SOURCE=false
RUN if [ ${CHANGE_SOURCE} = true ]; then \
  # Change application source from dl-cdn.alpinelinux.org to aliyun source
  sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/' /etc/apk/repositories \
  ;fi

RUN apk update \
  && apk upgrade \
  && apk add --no-cache openssl \
  && apk add --no-cache bash \
  && adduser -D -H -u 1000 -s /bin/bash www-data

ARG CONTAINER_NAME_PHP
ARG PHP_UPSTREAM_CONTAINER=${CONTAINER_NAME_PHP}
ARG PHP_UPSTREAM_PORT=9000

# Set upstream conf and remove the default conf
RUN echo "upstream php-upstream { server ${PHP_UPSTREAM_CONTAINER}:${PHP_UPSTREAM_PORT}; }" > /etc/nginx/conf.d/upstream.conf \
  && rm /etc/nginx/conf.d/default.conf

ADD ./startup.sh /opt/startup.sh
CMD ["/bin/bash", "/opt/startup.sh"]

EXPOSE 80 443
