# Baca Saya 
## Detail Skema 
Ini adalah skema docker compose yang bisa digunakan untuk menjalankan laravel. 
Beberapa program yang digunakan adalah:
- Apache
- PHP 8.2
- Laravel atau Project (Taruh di app)
- MySQL 8.0

## Cara Menggunakan
1. Pastikan anda sudah menginstall docker dan docker-compose di komputer anda.
2. Download atau clone repository ini.
3. Buka terminal dan masuk ke direktori tempat anda menyimpan file ini.
4. copy baris code berikut:
    ```bash
   cp .env.example .env
   ```
5. Ubah bagian .env dan docker-compose.yml sesuai dengan intruksi command.
6. Setelah semua diubah, lalu jalankan perintah berikut untuk membangun dan menjalankan container:
   ```bash
   docker-compose up -d --build
   ```
7. Tunggu hingga semua ter-download semua hingga selesai.
8. Setelah container berjalan, buka browser anda dan akses `http://localhost:8000` untuk melihat aplikasi Laravel yang sedang berjalan.
9. Jangan lupa untuk mengatur file `.env` file project kalian (laravel) sesuai dengan kebutuhan anda, terutama bagian database.