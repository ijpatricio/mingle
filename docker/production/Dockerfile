FROM composer:2 as build_composer
WORKDIR /app
COPY . /app
RUN composer install --no-dev --ignore-platform-reqs --no-interaction

FROM node:20 as build_frontend
WORKDIR /app
COPY --from=build_composer /app /app
RUN npm ci
RUN npm run build
RUN rm -rf node_modules

FROM serversideup/php:beta-8.3-fpm-nginx

# Switch to root so we can do root things
USER root

# Save the build arguments as a variable
ARG USER_ID
ARG GROUP_ID

# Install extensions
RUN install-php-extensions intl

# Use the build arguments to change the UID
# and GID of www-data while also changing
# the file permissions for NGINX
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID && \
    \
    # Update the file permissions for our NGINX service to match the new UID/GID
    docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID --service nginx

# Drop back to our unprivileged user
USER www-data


VOLUME ["/var/www/html/storage/app", "/var/www/html/storage/logs"]

# PROJECT FILES OWNERSHIP AND PERMISSIONS
COPY --from=build_frontend --chown=www-data:www-data /app /var/www/html
