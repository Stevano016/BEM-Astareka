# BEM-USH (Sistem Informasi BEM Astareka)

Sistem Informasi Manajemen dan Portal Publik untuk Badan Eksekutif Mahasiswa (BEM) Universitas. Proyek ini dibangun dengan tujuan untuk mengelola aspirasi mahasiswa, publikasi berita, program kerja, serta struktur organisasi secara digital dan terintegrasi.

##  Fitur Utama

- **Manajemen Berita**: Pengelolaan artikel dan berita kegiatan BEM dengan editor TinyMCE.
- **Aspirasi Mahasiswa**: Fitur bagi mahasiswa untuk menyampaikan aspirasi secara online.
- **Program Kerja**: Visualisasi dan pengelolaan daftar program kerja organisasi.
- **Struktur Organisasi**: Manajemen data pengurus dan struktur organisasi.
- **Manajemen Hero/Slider**: Pengaturan tampilan utama (banner) pada halaman depan.
- **Dashboard Admin**: Area khusus administrator untuk mengelola seluruh konten situs.
- **Profil BEM**: Informasi lengkap mengenai visi, misi, dan identitas organisasi.

##  Teknologi yang Digunakan

### Backend
- **Framework**: [Laravel 13.4.0](https://laravel.com)
- **Bahasa**: PHP 8.3+
- **Database**: MySQL / PostgreSQL / SQLite (sesuai konfigurasi `.env`)
- **Autentikasi**: Laravel Breeze

### Frontend
- **Bundler**: Vite
- **CSS Framework**: Tailwind CSS
- **JavaScript Framework**: Alpine.js
- **Rich Text Editor**: TinyMCE

##  Prasyarat

Sebelum memulai, pastikan Anda telah menginstal:
- PHP >= 8.3
- Composer
- Node.js & NPM
- Database Server (seperti MySQL atau MariaDB)

##  Langkah Instalasi

1. **Clone repositori ini:**
   ```bash
   git clone <url-repository>
   cd BEM-USH
   ```

2. **Instal dependensi PHP:**
   ```bash
   composer install
   ```

3. **Instal dependensi JavaScript:**
   ```bash
   npm install
   ```

4. **Konfigurasi Lingkungan:**
   Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database Anda.
   ```bash
   cp .env.example .env
   ```

5. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

6. **Migrasi Database & Seeding:**
   Lankan perintah ini untuk membuat tabel dan mengisi data awal (termasuk akun admin).
   ```bash
   php artisan migrate --seed
   ```

7. **Buat Storage Link (WAJIB untuk file upload):**
   ```bash
   php artisan storage:link
   ```

8. **Jalankan Aplikasi:**
   Gunakan perintah berikut untuk menjalankan server pengembangan dan Vite (secara bersamaan):
   ```bash
   php artisan serve
   npm run dev
   ```

##  Penggunaan

### Menjalankan Server
- Server Laravel: `php artisan serve`
- Vite (Asset Bundling): `npm run dev` atau `npm run build` untuk produksi.

### Perintah Khusus Proyek
Proyek ini memiliki skrip setup otomatis yang didefinisikan dalam `composer.json`:
```bash
composer run setup
```
Perintah di atas akan menjalankan instalasi composer, penyalinan `.env`, generate key, migrasi, instalasi npm, dan build asset secara otomatis.

##  Struktur Folder Utama

- `app/Http/Controllers/Admin`: Berisi logika untuk manajemen konten oleh administrator.
- `app/Models`: Definisi model database (Berita, Aspirasi, ProgramKerja, dll).
- `resources/views/admin`: Template halaman dashboard admin.
- `resources/views/frontend`: Template halaman publik (Beranda, Tentang, Berita, Aspirasi).
- `public/storage`: Direktori untuk file unggahan seperti gambar berita dan struktur organisasi.

##  Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan lakukan *fork* dan buat *pull request*, atau buka *issue* untuk melaporkan bug.

##  Lisensi

Proyek ini berlisensi di bawah [MIT license](https://opensource.org/licenses/MIT).
