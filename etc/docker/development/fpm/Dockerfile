FROM randock/docker-ubuntu-php:7.2-dev

COPY php-fpm7.2.conf /etc/php/7.2/fpm/php-fpm.conf

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get update && apt-get install yarn -y

RUN npm cache clean -f && npm install -g n && n stable

RUN npm install gulp-cli -y
