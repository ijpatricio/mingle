FROM serversideup/php:8.3-fpm-nginx-bookworm-v3.3.0-beta3 as starting_point

# Switch to root so we can do root things
USER root

# Save the build arguments as a variable
ARG USER_ID=1000
ARG GROUP_ID=1000

# Install extensions
RUN install-php-extensions intl

# Use the build arguments to change the UID
# and GID of www-data while also changing
# the file permissions for NGINX
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID && \
    \
    # Update the file permissions for our NGINX service to match the new UID/GID
    docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID --service nginx

RUN echo "alias ll='ls -al'" >> /var/www/.bashrc ; chown www-data:www-data /var/www/.bashrc

# Drop back to our unprivileged user
USER www-data

#VOLUME ["/var/www/html/storage/app", "/var/www/html/storage/logs"]

# PROJECT FILES OWNERSHIP AND PERMISSIONS
COPY --chown=www-data:www-data . /var/www/base

# Because we have the wrapper project udner the package directory, we have to make these moves
RUN mv /var/www/base/wrapper-mingle/* /var/www/html/ \
    && mv /var/www/base/wrapper-mingle/.[!.]* /var/www/html/ \
    && rm -rf /var/www/base/wrapper-mingle /var/www/html/packages/mingle \
    && mkdir -p /var/www/html/packages/mingle \
    && mv /var/www/base/* /var/www/html/packages/mingle/ \
    && mv /var/www/base/.[!.]* /var/www/html/packages/mingle/

RUN composer install \
    && rm -rf public/hot

FROM node:20 as build_frontend
WORKDIR /app
COPY --from=starting_point /var/www/html /app
RUN npm ci ; npm run build

FROM starting_point

COPY --from=build_frontend --chown=www-data:www-data /app /var/www/html
