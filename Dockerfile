FROM alpine:3.12.0

LABEL key="DWIFF C. BACONGUIS"

RUN apk update && apk upgrade
RUN apk add apache2 bash curl php php-mbstring php-xml php-pdo php-odbc \
    php-pdo_mysql php-pdo_sqlite php-gd php-apache2 php-json php-phar \
    php-zip php-tokenizer php-fileinfo php-dom php-xmlwriter \
    php-session php-curl sqlite npm
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /bin/composer
COPY ./apache-face-detection.conf /etc/apache2/conf.d/face-detection.conf
RUN sed -i 's@^#LoadModule rewrite_module modules/mod_rewrite\.so@LoadModule rewrite_module modules/mod_rewrite.so@' /etc/apache2/httpd.conf
COPY php.ini /etc/php7/php.ini

RUN mkdir -p /opt/face-detection
WORKDIR /opt/face-detection

ENV PATH="/opt/face-detection/vendor/bin:${PATH}"

ENTRYPOINT ["/usr/sbin/httpd", "-D", "FOREGROUND"]
