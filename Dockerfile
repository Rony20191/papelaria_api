FROM php:7.4-fpm


COPY composer.lock composer.json /var/www/


WORKDIR /var/www

#install depedendies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libonig-dev \
    libxml2-dev \
    locales \
    zip \
    vim \
    unzip

RUN  docker-php-ext-install mysqli  pdo_mysql
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-install gd


RUN apt-get clean &&  rm -rf /var/lib/apt/lists/*




RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY docker-files/app/ /var/www/.env




RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www
COPY --chown=www:www . /var/www

RUN chown -R www-data:www-data /var/www



USER www

EXPOSE 10080
