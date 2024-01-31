FROM yiisoftware/yii2-php:8.3-apache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
