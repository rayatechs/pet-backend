# Use the official PHP 8.2 image with FPM as the base image
FROM php:8.2-fpm

# Set working directory to /var/www
WORKDIR /var/www

# Install system dependencies, including libcurl and its development package
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libcurl4-openssl-dev # Add libcurl development package

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd curl

# Get the latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create a system user to run Composer and Artisan commands
ARG user=laravel
ARG uid=1000

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && chown -R $user:$user /home/$user

# Switch to the user created
USER $user
