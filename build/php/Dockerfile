FROM php:8.1-apache

# Update packages and install necessary PHP extensions
RUN apt-get update && \
    docker-php-ext-install mysqli pdo pdo_mysql

# Enable mod_rewrite
RUN a2enmod rewrite

# Configure Apache to allow .htaccess in the document root
RUN echo "<Directory /var/www/html>" >> /etc/apache2/sites-available/000-default.conf
RUN echo "    AllowOverride All" >> /etc/apache2/sites-available/000-default.conf
RUN echo "</Directory>" >> /etc/apache2/sites-available/000-default.conf

# Copy application files and .htaccess
COPY . /var/www/html/
