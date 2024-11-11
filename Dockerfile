# Usar la imagen base de PHP
FROM php:8.1-fpm

# Instalar dependencias necesarias (curl, git, etc.)
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP necesarias
RUN apt-get update && apt-get install -y \
    php-cli \
    php-mbstring \
    php-xml \
    php-curl \
    php-zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html

# Instalar dependencias de Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Instalar dependencias de Yarn
RUN yarn install && yarn prod

# Exponer el puerto que usará PHP-FPM
EXPOSE 9000

# Comando por defecto para ejecutar PHP-FPM
CMD ["php-fpm"]
