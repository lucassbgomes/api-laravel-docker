#!/bin/bash
export $(grep 'APP_CONTAINER_NAME' .env | xargs -d '\n') && docker exec -it -u 1000 "$(echo -n $APP_CONTAINER_NAME-phpfpm)" /bin/bash
