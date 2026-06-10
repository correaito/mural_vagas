FROM php:7.4-apache

# Instalar dependências e extensões do PHP comumente usadas em projetos legados
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql mysqli zip

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite
