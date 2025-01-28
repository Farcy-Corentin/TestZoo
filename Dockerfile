##  OLD VERSION
#Utiliser une image PHP basée sur Alpine
#FROM php:8.3-fpm-alpine
#
## Installer les dépendances système avec apk
#RUN apk add --no-cache \
#    git \
#    curl \
#    unzip \
#    libpng-dev \
#    libjpeg-turbo-dev \
#    libwebp-dev \
#    freetype-dev \
#    libzip-dev \
#    oniguruma-dev \
#    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
#    && docker-php-ext-install pdo_mysql mbstring zip gd
#
## Installer Composer
#COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
#
## Définir le répertoire de travail
#WORKDIR /var/www/html
#
## Copier les fichiers de l'application
#COPY . .
#
## Installer les dépendances Laravel
#RUN composer install --no-dev --optimize-autoloader
#
## Donner les permissions correctes
#RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
#
## Exposer le port 9000 (utilisé par PHP-FPM)
#EXPOSE 9000
#
#CMD ["php-fpm"]
