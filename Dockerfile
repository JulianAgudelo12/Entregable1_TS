FROM composer:2 AS composer

FROM amazonlinux:2023

RUN dnf install -y --skip-broken \
    php8.4 php8.4-cli php8.4-mysqlnd php8.4-xml php8.4-mbstring php8.4-zip \
    curl zip unzip \
  && dnf clean all

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY composer.json composer.lock ./

COPY . .

RUN composer install 


RUN cp .env.example .env \
  && php artisan key:generate \
  && chown -R apache:apache /var/www/storage /var/www/bootstrap/cache

EXPOSE 8000


CMD ["sh","-c","php artisan migrate --force && php artisan serve"]