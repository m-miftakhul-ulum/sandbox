FROM dunglas/frankenphp

COPY . /app
WORKDIR /app

RUN composer install --no-dev --optimize-autoloader

CMD ["frankenphp", "-c", "frankenphp.conf"]
