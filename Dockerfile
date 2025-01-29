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

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer -V

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs
RUN npm install -g npm
RUN npm install -g pnpm

workdir /var/www/html

COPY . .

RUN pnpm install
RUN pnpm build

CMD ["pnpm", "start"]

EXPOSE 8000
