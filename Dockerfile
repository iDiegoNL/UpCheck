FROM php:7.3-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libfreetype6-dev \
    supervisor

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath zip intl dom

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-enable intl

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer global require hirak/prestissimo

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

RUN mkdir -p /var/log/supervisor/ && chown -R $user:$user /var/log/supervisor/
RUN mkdir -p /var/run/supervisor/ && chown -R $user:$user /var/run/supervisor/

COPY ./docker-compose/supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

WORKDIR /var/www

ENV user=$user
CMD /usr/bin/supervisord -n -u $user
