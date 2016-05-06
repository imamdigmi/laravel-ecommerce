# E-Commerce
Aplikasi ini saya buat untuk teman-teman yang membutuhkan referensi pembuatan aplikasi menggunakan Laravel 5

## Versi saat ini
v0.3.4 --
_Mengacu pada semantyc versionning_

## Minimum Requirements
1. PHP versi 5.6 atau diatasnya
2. Composer Package Manager
3. NodeJS dan NPM
4. Gulp

## Cara menjalankan aplikasi
Download source code nya di
```
https://github.com/imamdigmi/laravel-ecommerce.git
```

Install package dependency vendor untuk laravel
```
composer install
```

Install dependency modul tambahan
```
npm install
```

Konfigurasi database
* Buat file `.env` di dalam root directory  
* Copy isi dari file `.env.example` lalu paste di dalam file `.env`
* Isi informasi database : `DB_DATABASE`, `DB_USERNAME` dan `DB_PASSWORD`

Jalankan perintah dibawah untuk menghasilkan key
```
php artisan key:generate
```

Jalankan perintah dibawah ini untuk membuat tabel-tabel dan seeding datanya
```
php artisan migrate:refresh --seed
```

Jalankan perintah ini untuk membuild plugin tambahan
```
gulp
```

Setup domain di homestead atau buat virtualhost di server atau jalankan built in server bawaan laravel dengan perintah
```
php artisan serve
```

**_Semoga Bermanfaat :)_**