# Baca Saya 

## Detail Skema 
Ini adalah skema docker compose yang bisa digunakan untuk menjalankan Laravel.  
Beberapa program yang digunakan adalah:
- Apache
- PHP 8.2
- Laravel atau Project (Taruh di `app`)
- MySQL 8.0

## Cara Menggunakan
1. Pastikan anda sudah menginstall Docker dan Docker Compose di komputer anda.
2. Download atau clone repository ini.
3. Buka terminal dan masuk ke direktori tempat anda menyimpan file ini.
4. Salin file konfigurasi `.env`:
    ```bash
    cp .env.example .env
    ```
5. Ubah bagian `.env` dan `docker-compose.yml` sesuai kebutuhan proyek.
6. Jalankan perintah berikut untuk membangun dan menjalankan container:
    ```bash
    docker-compose up -d --build
    ```
7. Tunggu hingga proses selesai dan semua container berjalan.
8. Buka browser dan akses `http://localhost:8000` untuk melihat aplikasi Laravel.
9. Pastikan file `.env` di dalam folder Laravel (`app/.env`) sudah diatur dengan benar, terutama bagian konfigurasi database.

## Edit File `.env` Laravel dari Dalam Container
Jika ingin mengedit file `.env` Laravel dari dalam container:

1. Masuk ke container Laravel:
    ```bash
    docker exec -it laravel-app bash
    ```
2. Masuk ke direktori project `/var/www`.
3. Clone `.env` project (Laravel):
    ```bash
    cp .env.example .env
    ```
4. Ketik baris dibawah untuk men-generate key:
    ```bash
    php artisan key:generate
    ```
5. Ketika ingin edit file `.env`, harus mengunduh nano terlebih dahulu:
    ```bash
    apt update && apt install nano -y
    ```
    Setelah unduh nano, kalian bisa edit dengan:
    ```bash
    nano .env
    ```
6. Setelah selesai, tekan `CTRL + X`, lalu `Y`, dan tekan `ENTER` untuk menyimpan.
7. Jika ingin keluar dari `/var/www`, kalian ketik `exit`.