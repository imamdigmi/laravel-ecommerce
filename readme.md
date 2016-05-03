# E-Commerce
Aplikasi ini saya buat untuk teman-teman yang membutuhkan referensi pembuatan aplikasi menggunakan Laravel 5

## Versi saat ini
v0.2.2

_Mengacu pada semantyc versioning_

## Minimum Requirements
1. PHP versi 5.6 atau diatasnya
2. Composer Package Manager
3. NodeJS dan NPM
4. Gulp

## Cara menjalankan aplikasi
1. Download source code nya di :
```
https://github.com/imamdigmi/laravel-ecommerce.git
```
1. Install package dependency vendor untuk laravel :
```
composer install
```
1. Install dependency modul tambahan :
```
npm install
```
1. Konfigurasi database :
..1. Buat file `.env` di dalam root directory  
..2. Copy isi dari file `.env.example` lalu paste di dalam file `.env`
..3. Isi informasi database : `DB_DATABASE`, `DB_USERNAME` dan `DB_PASSWORD`
1. Jalankan perintah dibawah untuk menghasilkan key :
```
php artisan key:generate
```
1. Jalankan perintah dibawah ini untuk membuat tabel-tabel dan seeding datanya :
```
php artisan migrate:refresh --seed
```
1. Jalankan perintah ini untuk membuild plugin tambahan :
```
gulp
```
1. Setup domain di homestead atau buat virtualhost di server atau jalankan built in server bawaan laravel dengan perintah :
```
php artisan serve
```
**_Semoga Bermanfaat :)_**