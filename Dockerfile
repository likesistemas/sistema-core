ARG VERSAO_PHP=likesistemas/php:latest

FROM ${VERSAO_PHP}

ENV VERSAO=1.1.0

COPY sh/ /usr/local/bin/
RUN chmod +x /usr/local/bin/configure-db \
 && chmod +x /usr/local/bin/configure-db-ini \
 && chmod +x /usr/local/bin/configure-db-tstore \
 && chmod +x /usr/local/bin/configure-app \
 && chmod +x /usr/local/bin/set-own \
 && chmod +x /usr/local/bin/set-rown \
 && chmod +x /usr/local/bin/new-folder \
 && chmod +x /usr/local/bin/start-core \
 && chmod +x /usr/local/bin/entrypoint-app \
 && chmod +x /usr/local/bin/entrypoint-core \
 && chmod +x /usr/local/bin/clear-www

RUN rm index.php

ENV AMBIENTE="producao"
ENV ARQUIVO_CONFIG="config.ini"
ENV MEMCACHE_PORT=11211
ENV APP_NAME="core"

RUN set-own ${PUBLIC_HTML}

ENV FILES_FOLDER="files/"
RUN new-folder ${FILES_FOLDER}
VOLUME ${FILES_FOLDER}

ENV TEMP_FOLDER="temp/"
RUN new-folder ${TEMP_FOLDER}
VOLUME ${TEMP_FOLDER}

ENV LOGS_FOLDER="logs/"
RUN new-folder ${LOGS_FOLDER}
VOLUME ${LOGS_FOLDER}

ENV SOURCE_CODE_FOLDER="/var/src"

ENTRYPOINT [ "entrypoint-core" ]