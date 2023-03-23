FROM yiisoftware/yii2-php:7.4-apache

WORKDIR /app

COPY . ./

RUN composer install

EXPOSE 80
