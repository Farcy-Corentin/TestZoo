# Étape 1 : Installation PHP et extensions
FROM php:8.3-fpm

RUN apt-get update \
    && apt-get install -y git \
    curl \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo_mysql mbstring zip gd \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Étape 2 : Installation Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer -V

# Étape 3 : Installation Node.js et PNPM
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm pnpm \
    && pnpm config set store-dir /root/.pnpm-store  # Déplace le cache

# Définition du dossier de travail
WORKDIR /var/www/html

# Copie du projet
COPY . .

# Étape 4 : Installation et build avec PNPM
RUN pnpm install --frozen-lockfile \
    && pnpm build \
    && pnpm store prune  # Nettoie le cache

# Exposition du port
EXPOSE 8000

# Démarrage de l'application
CMD ["pnpm", "start"]
