############################################
# Base Image
############################################
FROM serversideup/php:8.3-fpm-nginx-bookworm-v3.3.0-beta3 as base

############################################
# Development Image
############################################
FROM base as development

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
