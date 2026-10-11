# GeoHadir - Aplikasi Presensi Siswa PKL Berbasis GPS 📍

Aplikasi *mobile* sederhana yang dibangun menggunakan MIT App Inventor untuk memantau kehadiran siswa Praktik Kerja Lapangan (PKL) atau magang. Proyek ini dibuat untuk memenuhi syarat Tugas Akhir Mata Pelajaran Mobile.

Aplikasi ini mencatat identitas siswa beserta titik koordinat lokasi (Latitude & Longitude) secara *real-time* menggunakan sensor GPS HP, lalu mengirimkannya ke *database* MySQL melalui API PHP.

## 🌟 Fitur Utama
1. **Sistem Multi-Layar (3 Navigasi):**
   - **Screen Login:** Memasukkan NIS dan Nama Siswa (disimpan lokal menggunakan *TinyDB*).
   - **Dashboard:** Layar sapaan dan menu utama aplikasi.
   - **Screen Input Data:** Layar untuk melacak lokasi GPS dan mengirim data ke *server*.
2. **Sensor Lokasi:** Memanfaatkan komponen `LocationSensor` untuk memastikan siswa berada di lokasi magang.
3. **Database Eksternal (MySQL):** Menggunakan jembatan `api.php` untuk menyimpan data secara permanen.
4. **Web Admin Dashboard:** Halaman khusus `admin.php` untuk melihat rekapitulasi data absensi.
5. **Ekspor ke Excel:** Fitur mencetak tabel rekapitulasi data kehadiran ke dalam format `.xls` langsung dari *browser*.

## 🛠️ Teknologi yang Digunakan
* **Frontend Mobile:** MIT App Inventor
* **Backend API & Admin:** PHP Native
* **Database:** MySQL (Laragon / XAMPP)

## 📂 Struktur Repositori
* `GeoHadir_App.aia` - *Source code* mentah MIT App Inventor (bisa di-*import* untuk diedit).
* `GeoHadir_App.apk` - *File* *installer* aplikasi Android siap pakai.
* `api.php` - Skrip *backend* untuk menerima data dari aplikasi ke *database*.
* `admin.php` - Skrip *frontend web* untuk menampilkan tabel rekap dan fitur unduh Excel.
* `pkl_db.sql` - *File* hasil *export database* MySQL untuk di-*import* ke *server* lokal.

## 🚀 Cara Instalasi & Menjalankan Proyek

### 1. Setup Database
1. Nyalakan Apache dan MySQL di Laragon / XAMPP.
2. Buka phpMyAdmin atau *database tool* bawaan.
3. Buat *database* baru bernama `pkl_db`.
4. *Import* file `pkl_db.sql` ke dalam *database* tersebut.

### 2. Setup Web Server
1. Buat folder baru bernama `pkl_app` di dalam direktori `www` (Laragon) atau `htdocs` (XAMPP).
2. Pindahkan *file* `api.php` dan `admin.php` ke dalam folder tersebut.
3. Cek *IP Address* komputermu (misal: `192.168.1.16`).

### 3. Setup MIT App Inventor (Opsional jika ingin *build* ulang)
1. Buka MIT App Inventor, lalu *import file* `.aia`.
2. Buka bagian **Blocks** di **Screen Input_Data**.
3. Cari blok URL `Web1` dan ubah alamat IP-nya sesuai dengan *IP Address* komputermu saat ini (contoh: `http://192.168.1.16/pkl_app/api.php`).
4. Lakukan *Build* ulang ke `.apk`.

## 📸 Screenshot

*(Catatan: Silakan ganti teks ini dengan gambar screenshot aplikasimu. Caranya: drag and drop gambar ke editor GitHub)*
* Tampilan Aplikasi (Login & Absen)
* Tampilan Web Admin