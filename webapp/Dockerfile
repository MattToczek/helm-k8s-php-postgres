FROM php:7.2-apache
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pgsql
COPY index.php /var/www/html/index.php
EXPOSE 80
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]