FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy custom configurations PHP
COPY .docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

USER root

COPY .docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini
COPY start-container /usr/local/bin/start-container
RUN chmod +x /usr/local/bin/start-container


# Create the sudoers.d directory if it doesn't exist
RUN mkdir -p /etc/sudoers.d

ARG USER_ID=1000
ARG GROUP_ID=1000
ARG USER_NAME=kuser

RUN groupadd -g ${GROUP_ID} mygroup \
    && useradd -u ${USER_ID} -g mygroup -m ${USER_NAME} \
    && echo "${USER_NAME} ALL=(ALL) NOPASSWD: ALL" > /etc/sudoers.d/${USER_NAME} \
    && chmod 0440 /etc/sudoers.d/${USER_NAME}

# Modify php-fpm configuration to use the new user and group
RUN sed -i "s/user = www-data/user = ${USER_NAME}/" /usr/local/etc/php-fpm.d/www.conf && \
    sed -i "s/group = www-data/group = mygroup/" /usr/local/etc/php-fpm.d/www.conf

# Create system user to run Composer and Artisan Commands
RUN mkdir -p /home/$USER_NAME/.composer && \
    chown -R $USER_NAME:mygroup /home/$user

ENTRYPOINT ["start-container"]
