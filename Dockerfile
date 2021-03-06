ARG VERSAO_PHP=likesistemas/php:latest

FROM ${VERSAO_PHP}

ENV VERSAO=1.1.0

COPY sh/ /usr/local/bin/
RUN chmod +x /usr/local/bin/configure-db \
 && chmod +x /usr/local/bin/configure-db-ini \
 && chmod +x /usr/local/bin/configure-db-tstore \
 && chmod +x /usr/local/bin/configure-app \
 && chmod +x /usr/local/bin/configure-volumes \
 && chmod +x /usr/local/bin/set-own \
 && chmod +x /usr/local/bin/set-rown \
 && chmod +x /usr/local/bin/new-folder \
 && chmod +x /usr/local/bin/entrypoint-app \
 && chmod +x /usr/local/bin/clear-www \
 && chmod +x /usr/local/bin/run-app

COPY events/ /var/events/

RUN rm index.php

ENV AMBIENTE="producao"
ENV ARQUIVO_CONFIG="config.ini"
ENV MEMCACHE_PORT=11211
ENV APP_NAME="core"

RUN set-own ${WWW}
RUN set-own ${PUBLIC_HTML}

ENV FILES_FOLDER="files"
ENV TEMP_FOLDER="temp"
ENV LOGS_FOLDER="logs"