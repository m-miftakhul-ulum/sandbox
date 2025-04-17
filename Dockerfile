FROM dunglas/frankenphp

COPY . /app
WORKDIR /app

CMD ["frankenphp", "-c", "frankenphp.conf"]
