# 🚀 **SANTUN RIAU**
### *Sistem Informasi Pelaporan Masyarakat (Studi Kasus)*

---

### ⚠️ **Disclaimer**
Proyek ini merupakan **Proyek Studi Kasus (Study Case)** untuk tujuan pembelajaran pengembangan perangkat lunak dan **BUKAN** merupakan aplikasi resmi milik **Pemerintah Provinsi Riau**. Seluruh data, logo, dan informasi yang ditampilkan bersifat **simulasi (fiktif)** guna mendemonstrasikan implementasi teknis *framework* **Laravel** dalam ekosistem *serverless*.

---

### 📝 **Deskripsi Proyek**
**Santun Riau** adalah platform aspirasi dan pengaduan layanan publik berbasis *web*. Proyek ini dirancang khusus untuk mendemonstrasikan bagaimana **Laravel** dapat dioptimalkan agar berjalan secara efisien di lingkungan **Cloud** dan **Serverless**.

Sistem ini mencakup siklus pelaporan yang komprehensif, mulai dari pengisian formulir dengan dukungan **titik koordinat lokasi**, unggah bukti visual melalui integrasi *cloud storage*, hingga manajemen status laporan pada sisi administrator.

---

### ✨ **Fitur Utama**
* **Formulir Pelaporan Terpadu**: Input data pengaduan yang mendukung kategorisasi laporan dan deskripsi detail secara terstruktur.
* **Integrasi Geolokasi**: Implementasi titik koordinat (**Latitude & Longitude**) untuk akurasi lokasi kejadian yang presisi.
* **Manajemen Aset Cloud**: Sistem unggah foto bukti laporan yang terintegrasi langsung dengan **Cloudinary**, guna mengatasi limitasi *read-only* pada infrastruktur **Vercel**.
* **Autentikasi Administrator**: Sistem keamanan *login* bagi petugas untuk mengelola, memvalidasi, serta memperbarui status laporan (**Pending, Proses, Selesai, Ditolak**).
* **Optimasi Arsitektur Serverless**: Penyesuaian khusus pada konfigurasi *session* dan *database* untuk menjamin stabilitas aplikasi di lingkungan modern.

---

### 🛠️ **Tech Stack**
* **Core Framework**: Laravel 11 (PHP 8.3)
* **Serverless Database**: Neon PostgreSQL
* **Cloud Media Storage**: Cloudinary (Media Management)
* **Deployment & Hosting**: Vercel (Serverless Functions)
* **User Interface**: Tailwind CSS

---

### ⚙️ **Environment**
Aplikasi ini telah dikonfigurasi secara khusus di **Vercel** dengan variabel berikut:
* `SESSION_DRIVER=cookie` – Mengatasi arsitektur *stateless* pada sistem Vercel.
* `DB_PREPARED_STATEMENTS=false` – Mitigasi error *cached plan* pada **PostgreSQL Connection Pooler**.
* `CLOUDINARY_URL` – Jalur integrasi API penyimpanan media pihak ketiga.
* `APP_URL` – Protokol wajib **HTTPS** untuk menjamin keamanan *Session* dan *CSRF Token*.

---

### 💡 **Analisis Teknis & Pembelajaran**
Dalam proses pengembangan sistem ini, terdapat beberapa tantangan teknis yang berhasil diselesaikan:
1.  **Optimasi Database**: Berhasil menangani koneksi **PostgreSQL** pada lingkungan *Connection Pooling* untuk menjaga performa *query*.
2.  **Stateless File Handling**: Mengatasi kendala penulisan direktori pada server **Read-Only (Vercel)** dengan mengalihkan *file system* ke jalur *external cloud storage*.
3.  **Security Protocols**: Mengamankan *session* dan *CSRF validation* pada komunikasi antar-server melalui enkripsi **SSL/HTTPS**.

---

### 🖼️ **Galeri**

<img width="1483" height="862" alt="image" src="https://github.com/user-attachments/assets/9ef1bd54-ca65-41d5-bb2c-033045e80f3b" />
<img width="1496" height="862" alt="image" src="https://github.com/user-attachments/assets/fdbb9ae4-4c64-4ad3-97d7-c5e86886e473" />
<img width="1483" height="856" alt="image" src="https://github.com/user-attachments/assets/7b859106-8851-4f15-a9d2-e948c13e5c74" />
<img width="1501" height="861" alt="image" src="https://github.com/user-attachments/assets/667b34b6-3ed1-4f75-afa4-69c00b83571f" />
<img width="1919" height="858" alt="image" src="https://github.com/user-attachments/assets/1dbacd20-520e-443f-97ba-1cd30f60b105" />
<img width="1918" height="866" alt="image" src="https://github.com/user-attachments/assets/1d03da6f-8bbb-4db0-8c87-f93be9825012" />
<img width="1919" height="855" alt="image" src="https://github.com/user-attachments/assets/b9959628-2291-4025-94cd-8bdc38cda664" />

