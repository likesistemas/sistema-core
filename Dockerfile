ARG VERSAO_PHP=likesistemas/php:latest

FROM ${VERSAO_PHP}

ENV BUILD_NR 1

COPY sh/ /usr/local/bin/
RUN sudo chmod +x /usr/local/bin/configure-db \
 && sudo chmod +x /usr/local/bin/configure-db-ini \
 && sudo chmod +x /usr/local/bin/configure-db-tstore \
 && sudo chmod +x /usr/local/bin/configure-app \
 && sudo chmod +x /usr/local/bin/set-own \
 && sudo chmod +x /usr/local/bin/set-rown \
 && sudo chmod +x /usr/local/bin/new-folder \
 && sudo chmod +x /usr/local/bin/start-core \
 && sudo chmod +x /usr/local/bin/entrypoint-app \
 && sudo chmod +x /usr/local/bin/clear-www

RUN sudo rm index.php

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

CMD start-core && start