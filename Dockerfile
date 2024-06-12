# Utilisation de l'image webdevops/php-nginx:8.3-alpine comme base
FROM webdevops/php-nginx:8.3-alpine

# Installation des dépendances nécessaires à PHP
RUN apk add --no-cache \
        oniguruma-dev \
        libxml2-dev \
        mysql-client

# Installation des extensions PHP requises
RUN docker-php-ext-install \
        bcmath \
        ctype \
        fileinfo \
        mbstring \
        pdo_mysql \
        xml

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installation de NodeJS et npm
RUN apk add --no-cache nodejs npm

# Configuration des variables d'environnement pour PHP-Nginx
ENV WEB_DOCUMENT_ROOT /app/public
ENV APP_ENV production

# Définition du répertoire de travail
WORKDIR /app

# Copie de l'ensemble des fichiers du projet dans le répertoire de travail
COPY . .

# Copie du fichier .env.example pour le renommer en .env
RUN cp -n .env.example .env

# Installation et configuration du site pour la production
RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN php artisan key:generate
RUN php artisan config:cache
# RUN php artisan route:cache
RUN php artisan view:cache
RUN php artisan migrate --force
RUN php artisan db:seed --force

# Compilation des assets (Breeze ou autres)
RUN npm install
RUN npm run build

# Attribution des droits à l'utilisateur application sur le répertoire de travail
RUN chown -R application:application .
