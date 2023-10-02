## Installation project

Cara install project menggunakan terminal/CMD. Pastikan direktori folder berada di C:\xampp\htdocs. Dan buat database pada phpMyAdmin dengan nama lokerin.

```bash
  git clone https://github.com/Mahib22/lokerin.git
  cd lokerin
  composer install
  cp .env.example .env
  php artisan key:generate
  npm install
  npm run dev
  php artisan migrate
  php artisan db:seed
  php artisan serve
```
