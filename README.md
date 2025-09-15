# Project Laravel 12 + Vue 3 + Inertia

## Identitas
- Nama: Harithya Wisesa
- Email: harithya77@gmail.com
- No. HP: 089662471104

## Teknologi yang Digunakan
- Laravel 12
- Vue 3
- Inertia.js
- Vite

## Langkah Menjalankan di Lingkungan Lokal

1. Clone repository
   ```bash
   git clone https://github.com/username/nama-project.git
   cd nama-project

2. Lakukan perintah berikut
   ```bash
   composer install
   npm install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   php artisan storage:link

3. Isikan Env (Kredensial penting di kirim lewat email)
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_db
   DB_USERNAME=root
   DB_PASSWORD=
 
   TRIPAY_URL=
   TRIPAY_MERCHANT_CODE=
   TRIPAY_API_KEY=
   TRIPAY_PRIVATE_KEY=

4. Jalankan perintah berikut
   ```bash
   composer run dev

5. Kredensial Login
   Super Admin : 
   ```bash
   Email: admin@gmail.com
   Password: admin
   ```

   Customer :
   ```bash
   Email: customer@gmail.com
   Password: customer
   ```

