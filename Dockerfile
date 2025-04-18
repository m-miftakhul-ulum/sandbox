FROM php:8.2-apache

# Copy semua file dari direktori saat ini ke /var/www/html di container
COPY . /var/www/html

# Berikan permission yang sesuai (opsional, tergantung kebutuhan)
RUN chown -R www-data:www-data /var/www/html

# Aktifkan mod_rewrite (jika pakai .htaccess)
RUN a2enmod rewrite

# (Opsional) Ubah Apache config supaya .htaccess bisa bekerja
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Expose port 80
EXPOSE 80
