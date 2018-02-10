
# TASK-APP

## Dependencies
* php 7+
* [Composer](https://getcomposer.org/download/)
* [Node.js + npm](https://nodejs.org/en/)

## Setup
* Clone repo
* Install dependencies: composer install && npm install
* Setup dev environment. Homestead is recommended.
* Copy .env.example to .env and fill in your database credentials.`cp .env.example .env && vim .env` 
* Generate app key: `php artisan key:generate`
* Inside you VM, generate database content: `php artisan migrate:refresh --seed`
* Create symlink to storage inside your VM: `php artisan storage:link`
