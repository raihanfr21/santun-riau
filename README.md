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

🖼️Gallery
<img width="1483" height="862" alt="image" src="https://github.com/user-attachments/assets/9ef1bd54-ca65-41d5-bb2c-033045e80f3b" />
<img width="1496" height="862" alt="image" src="https://github.com/user-attachments/assets/fdbb9ae4-4c64-4ad3-97d7-c5e86886e473" />
<img width="1483" height="856" alt="image" src="https://github.com/user-attachments/assets/7b859106-8851-4f15-a9d2-e948c13e5c74" />
<img width="1501" height="861" alt="image" src="https://github.com/user-attachments/assets/667b34b6-3ed1-4f75-afa4-69c00b83571f" />
<img width="1919" height="858" alt="image" src="https://github.com/user-attachments/assets/1dbacd20-520e-443f-97ba-1cd30f60b105" />
<img width="1919" height="855" alt="image" src="https://github.com/user-attachments/assets/b9959628-2291-4025-94cd-8bdc38cda664" />
<img width="1918" height="866" alt="image" src="https://github.com/user-attachments/assets/1d03da6f-8bbb-4db0-8c87-f93be9825012" />


