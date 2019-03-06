#!/bin/bash
export $(grep 'APP_CONTAINER_NAME' .env | xargs -d '\n') && docker exec -it "$(echo -n $APP_CONTAINER_NAME-web)" /bin/bash
