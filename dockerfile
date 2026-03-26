# imagem oficila do php apache
FROM php:8.2-apache

# instalar as extensoes do pdo necessarias
RUN docker-php-ext-install pdo pdo_mysql

# Copia todos os arquivos da pasta atual para dentro do container
COPY . /var/www/html/

# Dá permissão para o Apache conseguir gravar as fotos nos uploads
RUN chmod -R 777 /var/www/html/src/images/uploads/

# Expõe a porta 80
EXPOSE 80