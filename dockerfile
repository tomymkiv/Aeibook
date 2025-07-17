# Imagen base con PHP, Composer y extensiones necesarias
FROM php:8.4-cli

# Instala dependencias necesarias
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    sqlite3 \
    libsqlite3-dev

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establece el directorio de trabajo
WORKDIR /app

# Copia el proyecto Laravel
COPY . .

# Instala dependencias de Laravel
RUN composer install

# Genera clave de aplicación
RUN php artisan key:generate

# Da permisos a storage y cache
RUN chmod -R 775 storage bootstrap/cache

# Expone el puerto
EXPOSE 8000

# Comando para iniciar Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
