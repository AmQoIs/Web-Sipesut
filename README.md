# SIPESUT

## Sistem Informasi Pengelolaan Surat Inspektorat Jenderal TNI

## Dependency PHP yang digunakan

-   "laravel/framework"
-   "laravel/breeze"

## Dependency Javascript yang digunakan

-   "alpinejs"
-   "tailwindcss"
-   "sweetalert2"

## List Role

-   Admin
-   Anggota

## ERD dan Use Case

https://drive.google.com/file/d/1-5J3-BprTCxu-loqyPsJcQ4zUBsbULyV/view?usp=sharing

## Panduan Instalasi

Yang dilakukan setelah clone

1. Install composer-dependency pake `composer install`
2. Install npm package pake `npm install`, ini buat install beberapa package seperti tailwind dan alphine
3. Jalankan build css nya, pake `npm run dev`
4. Copy file `.env.example` di root folder terus ganti jadi `.env`. Setting sesuai dengan environment yang digunakan
5. Setting database, sesuaikan nama databasenya dengan yang ada di `.env`
6. Migrasikan database, `php artisan migrate`
7. Jalankan seeder `php artisan db:seed`
8. Jalankan `php artisan key:generate`
9. Jalankan project nya `npm run dev` lalu tambah terminal baru dan jalankan `php artisan serve`
