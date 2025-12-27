🚀 Santun Riau - Sistem Pelaporan Masyarakat (Study Case)

⚠️ Disclaimer
Proyek ini merupakan Proyek Studi Kasus (Study Case) untuk tujuan pembelajaran pengembangan perangkat lunak dan BUKAN merupakan aplikasi resmi milik Pemerintah Provinsi Riau. Seluruh data, logo, dan informasi yang ditampilkan bersifat simulasi (fiktif) untuk menunjukkan implementasi teknis framework Laravel dalam lingkungan serverless.

📝 Deskripsi Proyek
Santun Riau adalah platform aspirasi dan pengaduan layanan publik berbasis web. Proyek ini dibangun untuk mendemonstrasikan bagaimana aplikasi Laravel 11 dapat dioptimalkan agar berjalan secara efisien di lingkungan Cloud dan Serverless.

Aplikasi ini mencakup alur pelaporan masyarakat mulai dari pengisian form dengan titik koordinat lokasi, unggah bukti gambar, hingga manajemen status laporan oleh administrator.

✨ Fitur Utama
Form Pelaporan: Input laporan masyarakat yang mendukung kategori dan deskripsi detail.

Geolokasi: Integrasi titik koordinat (Latitude & Longitude) untuk akurasi lokasi kejadian.

Manajemen Aset Cloud: Unggah foto bukti laporan langsung ke Cloudinary (menghindari limitasi read-only pada Vercel).

Autentikasi Admin: Sistem login untuk petugas guna mengelola, memvalidasi, dan memperbarui status laporan (Pending, Proses, Selesai, Ditolak).

Optimasi Serverless: Penyesuaian konfigurasi session dan database khusus untuk infrastruktur modern.

🛠️ Tech Stack
Framework: Laravel 11 (PHP 8.3)

Database: Neon PostgreSQL (Serverless Database)

Storage: Cloudinary (Cloud Media Management)

Deployment: Vercel (Serverless Functions)

UI Framework: Tailwind CSS

⚙️ Konfigurasi Environment (Vercel)
Untuk menjalankan proyek ini di lingkungan serverless, variabel berikut telah dikonfigurasi:

SESSION_DRIVER=cookie – Mengatasi masalah stateless pada Vercel.

DB_PREPARED_STATEMENTS=false – Mencegah error cached plan pada PostgreSQL Pooler.

CLOUDINARY_URL – Integrasi penyimpanan gambar pihak ketiga.

APP_URL – Dipaksa menggunakan HTTPS untuk keamanan session.

💡 Apa yang Saya Pelajari dari Proyek Ini?
Dalam membangun proyek ini, saya berhasil memecahkan berbagai tantangan teknis seperti:

Menangani koneksi database PostgreSQL pada lingkungan Connection Pooling.

Mengatasi masalah penulisan direktori pada server Read-Only (Vercel).

Mengamankan session CSRF pada komunikasi antar-server melalui HTTPS.

<img width="1483" height="862" alt="image" src="https://github.com/user-attachments/assets/9ef1bd54-ca65-41d5-bb2c-033045e80f3b" />
