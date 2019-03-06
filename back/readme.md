<p align="center"><img src="http://www.gomes.eti.br/manutencao/logoManutencaoGomes.png"></p>


## Backend

The backend which is the server restify using Laravel + Passport + Eloquent + MariaDB

## Content

- [First .ENV Config - DB Connection](#.First-.ENV-Config---DB-Connection)
- [Build Setup](#Build-Setup)
- [Second .ENV Config - Passport Keys](#.Second-.ENV-Config---Passport-Keys)


## First .ENV Config - DB Connection

Make a copy of file <strong>.env-example</strong> and rename to .env, after, configure your database connection:

```sh
DB_USERNAME= your_db_user
DB_PASSWORD= secret
```

## Build Setup

```sh
# run composer update
composer update

# run artisan migrate
php artisan migrate

# execute passport installation
php artisan passport:install

# run artisan seed for database populate
php artisan db:seed

# create artisan simlink
php artisan storage:link

# generate app key
php artisan key:generate

# execute php dump
composer dump-autoload
```


## Second .ENV Config - Passport Keys

After passport installation, you need to configure PASSPORT CLIENT .env params:
Acces table oauth_client and copy secret content column to PASSPORT_CLIENT_SECRET .ENV config:

```sh
PASSPORT_CLIENT_ID=2
PASSPORT_CLIENT_SECRET= oauth_client_table__secret_column_content_from_user_2
```
