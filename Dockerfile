FROM php:8.1-fpm

# Change work directory.
WORKDIR /var/www

# Install dependencies.
RUN apt-get update && apt-get install -y \
    build-essential \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    locales \
    zip \
    nano \
    unzip \
    git \
    curl \
    iputils-ping \
    netcat

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install needle extensions.
RUN docker-php-ext-install pdo_mysql zip exif pcntl

# Setup composer.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy local files to container.
COPY . /var/www

# Set approprate permissions.
RUN chown -R www-data:www-data /var/www

# Install application dependencies with composer.
RUN composer install

# Generate application keys.
RUN php artisan key:generate

# Switch to user www-data
USER www-data

# Expose local port.
EXPOSE 9000

# Run fpm service.
CMD ["php-fpm"]
