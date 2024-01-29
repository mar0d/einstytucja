FROM php:8.3-apache

# Install dependencies
RUN apt-get update && \
    apt-get install -y libpq-dev mc nano git && \
    docker-php-ext-install pdo pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable Apache modules
RUN a2enmod rewrite

# Create a symlink for apache (if `/var/www/html` is available)
RUN rm -rf /var/www/html && ln -s /backend/web/ /var/www/html || true

# Expose Apache port
EXPOSE 80
