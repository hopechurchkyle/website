FROM wordpress

COPY --chown=www-data:www-data wp-config.php /var/www/html/wp-config.php
COPY --chown=www-data:www-data wp-content /var/www/html/wp-content
# COPY --chown=www-data:www-data wp-images /var/www/html/wp-images
# COPY --chown=www-data:www-data wp-includes/languages /var/www/html/wp-includes/languages

EXPOSE 80
