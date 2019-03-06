FROM php:7.3.0-fpm-stretch
LABEL br.com.builderall.version="1.0"
LABEL br.com.builderall.description="PHPFPM"
LABEL br.com.builderall.maintainer="Lucas S.B Gomes, Rogério M. de Queiroz"
LABEL br.com.builderall.vendor="BuilderAll - Devs Gurupi-TO"
RUN curl -fSL https://downloads.wkhtmltopdf.org/0.12/0.12.5/wkhtmltox_0.12.5-1.stretch_amd64.deb -o wkhtmltopdf.deb 
RUN apt update && apt upgrade -y && \
  apt install xfonts-75dpi \
  xfonts-base \
  wkhtmltopdf \
  libpng-dev \
  libgmp-dev \
  libzip-dev \
  zip \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libpq-dev \
  libfaketime -y && \
  dpkg -i wkhtmltopdf.deb && \
  apt clean && \
  apt autoremove -y
RUN docker-php-ext-configure zip --with-libzip && \
  docker-php-ext-configure opcache --enable-opcache && \
  docker-php-ext-configure gd \
  --enable-gd-native-ttf \
  --with-freetype-dir=/usr/include/freetype2 \
  --with-png-dir=/usr/include \
  --with-jpeg-dir=/usr/include && \
  docker-php-ext-install -j$(nproc) pdo bcmath pdo_mysql mysqli opcache zip mbstring gettext calendar sockets gmp gd
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
  rm /var/log/lastlog /var/log/faillog
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN echo "/usr/lib/x86_64-linux-gnu/faketime/libfaketime.so.1" > /etc/ld.so.preload
RUN mkdir /var/www/.composer && \
  chown -R www-data /var/www/.composer
#User/group www-data
RUN usermod -u 1000 www-data
ARG PATH_CONTAINER=/var/www
WORKDIR ${PATH_CONTAINER}
ENV SERVER_ADMIN rogerio.mq@gmail.com
