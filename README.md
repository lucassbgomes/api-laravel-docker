<p align="center"><img src="http://www.gomes.eti.br/gomes.png"></p>

# About api-laravel-docker
An environment built with docker, to meet an application with backend in Laravel and open frontend.

## Application Layer
This tool uses Docker as a container manager, to facilitate the development environment.
This project was separated two parts, the backend which is the server restify using Laravel + Passport + Eloquent + MariaDB; and the frontend which is on empty, and any frontend technology can be inserted.


## In the project root folder
Rename .env-example for ``.env``, after configure the ``.env``


## run in terminal
Go to the project root folder using the terminal and enter the command ``./start.sh``.

>This procedure usually lasts between 20 to 50 minutes

>If an error occurs in nginx, check if there is any program running on your computer using port 80, if there is, stop or change the port of this program and run the previous command again.


## run command
``./bash-php.sh`` or ``./bash-nginx.sh``
>This command allows you to navigate and execute commands inside the development container.
