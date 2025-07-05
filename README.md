# Jagoan-API

**Jagoan-API** adalah API backend untuk website **JagoCoding** yang dibangun menggunakan **Laravel**. API ini menyediakan berbagai endpoint untuk mendukung berbagai fitur di website **JagoCoding**. API ini menggunakan **JWT (JSON Web Token)** untuk autentikasi dan otorisasi pengguna.

## Table of Contents

- [Prasyarat](#prasyarat)
- [Instalasi](#instalasi)
  - [Clone Repository](#clone-repository)
  - [Instalasi Dependensi](#instalasi-dependensi)
  - [Konfigurasi Database dan `.env`](#konfigurasi-database-dan-env)
  - [Migrasi dan Seeder](#migrasi-dan-seeder)
  - [Menjalankan Aplikasi](#menjalankan-aplikasi)
- [Konfigurasi JWT](#konfigurasi-jwt)
- [Menambahkan Pengguna (Seeder)](#menambahkan-pengguna-seeder)
- [Pengujian](#pengujian)
- [License](#license)

## Prasyarat

Sebelum memulai, pastikan Anda telah menginstal perangkat lunak berikut:

- **PHP** >= 8.0
- **Composer** - Untuk mengelola dependensi PHP
- **MySQL** / **MariaDB** - Untuk database
- **Node.js** - Untuk menjalankan frontend (jika diperlukan)
- **Laravel** >= 8.x
- **JWT (Laravel Passport atau JWT Auth)** - Untuk autentikasi token

## Instalasi

### Clone Repository

Clone repository **Jagoan-API** dari GitHub menggunakan perintah berikut:

```bash
git clone https://github.com/username/jagoan-api.git
```

### Instalasi Dependensi

Setelah berhasil meng-clone repository, masuk ke direktori proyek dan instal semua dependensi menggunakan Composer:

```bash
cd jagoan-api
composer install
```

Jika Anda juga menggunakan **npm** untuk frontend (misalnya untuk React atau Vue.js), instal dependensi npm dengan perintah berikut:

```bash
npm install
```

### Konfigurasi Database dan `.env`

1. **Salin file `.env.example` menjadi `.env`:**

```bash
cp .env.example .env
```

2. **Konfigurasi database Anda di file `.env`. Pastikan Anda telah membuat database untuk aplikasi ini:**

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jagoan_api    # Nama database yang Anda buat
DB_USERNAME=root          # Username database Anda
DB_PASSWORD=your_password # Password database Anda
```

3. **Konfigurasi JWT di file `.env`. Anda perlu mengatur `JWT_SECRET` setelah konfigurasi:**

```env
JWT_SECRET=    # Anda akan mendapatkan nilai ini setelah menjalankan php artisan jwt:secret
```

### Migrasi dan Seeder

1. **Jalankan perintah migrasi untuk membuat tabel-tabel di database:**

```bash
php artisan migrate
```

2. **Untuk menambahkan data seeder (misalnya data pengguna awal), Anda dapat menjalankan perintah berikut untuk menjalankan seeder:**

```bash
php artisan db:seed
```

> **Catatan:** Seeder dapat ditambahkan di file `database/seeders/DatabaseSeeder.php`.

### Menjalankan Aplikasi

1. **Generate JWT Secret**: JWT memerlukan secret key untuk enkripsi token. Jalankan perintah berikut untuk mengenerate JWT Secret:

```bash
php artisan jwt:secret
```

Ini akan menambahkan key ke dalam file `.env` Anda.

2. **Jalankan aplikasi menggunakan server built-in Laravel:**

```bash
php artisan serve
```

Aplikasi sekarang dapat diakses di `http://localhost:8000`.

## Konfigurasi JWT

Untuk menggunakan JWT dalam proyek ini, pastikan Anda telah menginstal dan mengkonfigurasi JWT sesuai dengan panduan di atas. JWT digunakan untuk autentikasi dan otorisasi pengguna di seluruh API.

## Menambahkan Pengguna (Seeder)

Untuk menambahkan pengguna default atau data awal lainnya, Anda dapat membuat seeder baru atau menggunakan seeder yang sudah ada. Jalankan perintah berikut untuk membuat seeder baru:

```bash
php artisan make:seeder UserSeeder
```

Kemudian edit file seeder yang dibuat dan jalankan:

```bash
php artisan db:seed --class=UserSeeder
```

## Pengujian

### Testing dengan Postman

Untuk menguji API endpoints, Anda dapat menggunakan collection Postman yang telah disediakan:

**Postman Collection**: https://taamabwa.postman.co/workspace/King-Elang-~7e659b05-b28d-4729-8eeb-818d84df71c2/collection/43952736-8aa7fdd3-230a-4de9-b2ec-f31371162320?action=share&creator=43952736

### Cara Menggunakan Postman Collection:

1. **Import Collection**: Download dan import file collection Postman ke aplikasi Postman Anda
2. **Setup Environment**: Buat environment baru di Postman dengan variabel berikut:
   ```
   base_url: http://localhost:8000/api
   token: [akan diisi otomatis setelah login]
   ```
3. **Authentication**: Jalankan request **Login** terlebih dahulu untuk mendapatkan JWT token, username: admin@gmail.com & password: password
4. **Testing Endpoints**: Setelah mendapatkan token, Anda dapat menguji semua endpoint yang tersedia

### Unit Testing (Opsional)

Untuk menjalankan pengujian unit dan feature tests, gunakan perintah berikut:

```bash
php artisan test
```

## License

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

**Jagoan-API** - Backend API untuk JagoCoding