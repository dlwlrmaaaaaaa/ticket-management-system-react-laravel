# 1. Base PHP image
FROM php:8.2-fpm

# 2. Install dependencies
RUN apt-get update && apt-get install -y nginx git curl zip unzip \
    libzip-dev libonig-dev && \
    docker-php-ext-install pdo pdo_mysql zip

# 3. Set working dir
WORKDIR /var/www

# 4. Copy Laravel and install
COPY laravel_tms/ ./backend/
WORKDIR /var/www/backend
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install

# 5. Build React
WORKDIR /var/www
COPY react_tms/ ./frontend/
WORKDIR /var/www/frontend
RUN npm install && npm run build

# 6. Move React build to Laravel public
RUN cp -r dist/* /var/www/backend/public/

# 7. Copy Nginx config
COPY nginx.conf /etc/nginx/nginx.conf

# 8. Run PHP + Nginx
CMD service php8.2-fpm start && nginx -g 'daemon off;'
