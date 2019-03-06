#!/bin/bash

if [ ! -f /etc/nginx/ssl/default.crt ]; then
    openssl genrsa -out "/etc/nginx/ssl/default.key" 2048
    openssl req -new -key "/etc/nginx/ssl/default.key" -out "/etc/nginx/ssl/default.csr" -subj "/CN=default/O=default/C=UK"
    openssl x509 -req -days 365 -in "/etc/nginx/ssl/default.csr" -signkey "/etc/nginx/ssl/default.key" -out "/etc/nginx/ssl/default.crt"
fi

# if [ ! -f /etc/nginx/ssl/app.crt ]; then
#     openssl genrsa -out "/etc/nginx/ssl/app.key" 2048
#     openssl req -new -key "/etc/nginx/ssl/app.key" -out "/etc/nginx/ssl/app.csr" -subj "/CN=app/O=app/C=UK"
#     openssl x509 -req -days 365 -in "/etc/nginx/ssl/app.csr" -signkey "/etc/nginx/ssl/app.key" -out "/etc/nginx/ssl/app.crt"
# fi

if [ ! -f /etc/nginx/ssl/api.crt ]; then
    openssl genrsa -out "/etc/nginx/ssl/api.key" 2048
    openssl req -new -key "/etc/nginx/ssl/api.key" -out "/etc/nginx/ssl/api.csr" -subj "/CN=api/O=api/C=UK"
    openssl x509 -req -days 365 -in "/etc/nginx/ssl/api.csr" -signkey "/etc/nginx/ssl/api.key" -out "/etc/nginx/ssl/api.crt"
fi

nginx
