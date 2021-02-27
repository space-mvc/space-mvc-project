# space-mvc (A Lightweight PHP 8 MVC Framework)

## Space MVC - Install instructions
- git clone https://github.com/space-mvc/space-mvc.git
- cp .env.example .env
- composer install
- chmod 755 -R storage/logs

## Redis Cache - Install Instructions
- sudo apt update
- sudo apt install redis-server -y

## All Config Settings are inside the .env file
APP_NAME="SpaceMvc"
APP_URL="http://localhost"

DB_HOSTNAME="127.0.0.1"
DB_PORT=3306
DB_USERNAME="root"
DB_PASSWORD=""
DB_DATABASE="space_mvc"

REDIS_HOSTNAME="127.0.0.1"
REDIS_PORT=6379

## Notes
- This project requires the following plugin below installed to work correctly
- This plugin will automatically be installed when you run the composer install command
- https://github.com/space-mvc/space-mvc-framework.git
