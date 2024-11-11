# Usar una imagen base que tenga PHP y Apache
FROM php:8.1-apache

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    curl \
    gnupg \
    lsb-release \
    git \
    && curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g yarn

# Copiar los archivos de la aplicación
COPY . /var/www/html

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Instalar dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Instalar dependencias de Yarn
RUN yarn && yarn prod

# Correr los comandos de optimización de Laravel
RUN php artisan optimize && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan migrate --force

# Exponer el puerto de Apache
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]
