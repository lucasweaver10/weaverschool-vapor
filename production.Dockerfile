FROM laravelphp/vapor:php82

WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apk update && apk add --no-cache \
    curl \
    git \
    unzip \
    postgresql-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql exif

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer files and install dependencies
COPY composer.lock composer.json ./
RUN composer install --no-scripts --no-dev --prefer-dist --no-interaction

# Copy the application code
COPY . .

# Set permissions
RUN chown -R nobody:nobody storage bootstrap/cache

# Expose port 9000
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]