# Development stage
FROM php:8.3-fpm-alpine AS development

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apk add --no-cache \
    curl \
    libzip-dev \
    zip \
    postgresql-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql zip

# Install Xdebug
RUN apk add --no-cache --update linux-headers $PHPIZE_DEPS \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application code
COPY . .
RUN if [ ! -f .env.local ]; then cp .env.local.dist .env.local; fi

# Set permissions
RUN mkdir -p /var/www/html/var && mkdir -p /var/www/html/public
RUN chown -R www-data:www-data /var/www/html/var \
    && chown -R www-data:www-data /var/www/html/public

# Production stage
FROM php:8.3-fpm-alpine AS production

WORKDIR /var/www/html

RUN apk add --no-cache libzip-dev postgresql-dev
RUN docker-php-ext-install pdo pdo_pgsql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .
RUN if [ ! -f .env.local ]; then cp .env.local.dist .env.local; fi

RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p /var/www/html/var && mkdir -p /var/www/html/public
RUN chown -R www-data:www-data /var/www/html/var \
    && chown -R www-data:www-data /var/www/html/public

EXPOSE 9000