FROM renat/php-fpm-7.1-xdebug-mysql:base

ARG TIME_ZONE=Europe/Moscow
ENV TZ=${TIME_ZONE}
ARG USER=www-data
ENV USER=${USER}
ARG USER_ID=1000
ENV USER_ID=${USER_ID}
ARG GROUP=www-data
ENV GROUP=${GROUP}
ARG GROUP_ID=1000
ENV GROUP_ID=${GROUP_ID}

RUN groupadd -r -g ${GROUP_ID} ${GROUP} \
    && useradd --no-log-init -r -g ${USER} -u ${USER_ID} ${USER} \
    && mkdir -p /home/${USER}/.composer \
    && chown -R ${USER}:${GROUP} /home

USER ${USER}
WORKDIR /var/www/html/renat
CMD ["php-fpm"]

# docker build --no-cache --build-arg USER=${USER} --build-arg USER_ID=$(id -u) --build-arg GROUP=${USER} --build-arg GROUP_ID=$(id -g) -f 7.1.dev.Dockerfile -t renat/php-fpm-7.1-xdebug-mysql:dev .
