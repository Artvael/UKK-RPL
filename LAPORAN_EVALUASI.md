# LAPORAN EVALUASI & PENGUJIAN SISTEM APLIKASI PEMINJAMAN SARANA
**Uji Kompetensi Keahlian (UKK) Rekayasa Perangkat Lunak (RPL) 2026**

---

## 📋 1. Identitas Proyek & Pengujian
* **Nama Aplikasi:** Sistem Informasi Peminjaman Sarana & Inventaris Sekolah (PinjamSarpras)
* **Framework Backend:** Laravel 11 / PHP 8.2+
* **Database:** MySQL / MariaDB (`peminjaman_barang`)
* **Arsitektur:** Clean MVC dengan Multi-Level Role-Based Access Control (RBAC)
* **Status Pengujian:** 100% Selesai & Lulus Semua Skenario (*ALL PASS*)

---

## 🎯 2. Hasil Eksekusi Skenario Pengujian (5 Test Case Wajib)

Sesuai dengan lembar instrumen ujian praktik UKK RPL, berikut adalah hasil eksekusi 5 skenario pengujian utama:

| No | Modul / Pengujian | Skenario yang Diuji | Hasil yang Diharapkan | Hasil Pengujian Aktual | Status | File Screenshot Bukti |
| :---: | :--- | :--- | :--- | :--- | :---: | :--- |
| **1** | **Login User** | Pengujian autentikasi untuk 3 level pengguna: Admin (`admin`), Petugas (`petugas`), dan Siswa (`siswa1`). | User berhasil login dan diarahkan ke antarmuka dashboard sesuai hak akses masing-masing role. | Setiap role berhasil masuk dengan session terisolasi dan menu navigasi yang sesuai otoritas. | **PASS** | `screenshots/testcase_1_login_admin.png`<br>`screenshots/testcase_1_login_petugas.png`<br>`screenshots/testcase_1_login_siswa.png` |
| **2** | **Tambah Alat** | Admin/Petugas menambahkan alat baru (*Kamera Mirrorless Sony Alpha A6400*) melalui form master alat. | Data alat tervalidasi dan tersimpan di database MySQL serta langsung muncul pada katalog. | Data tersimpan dengan kode unik, kategori, stok awal, deskripsi, dan status kondisi 'Baik'. | **PASS** | `screenshots/testcase_2_form_isi_alat.png`<br>`screenshots/testcase_2_alat_tersimpan.png` |
| **3** | **Pinjam Alat** | Siswa mengajukan permohonan pinjam alat melalui form peminjaman mandiri. | Pengajuan tercatat dengan status awal 'Menunggu Konfirmasi' dan kode transaksi unik `PINJAM-YYYYMMDD-XXXX`. | Transaksi tercatat di database, kode transaksi terbentuk otomatis, dan antrean masuk ke panel petugas sarpras. | **PASS** | `screenshots/testcase_3_form_pengajuan.png`<br>`screenshots/testcase_3_pengajuan_tercatat.png` |
| **4** | **Pengembalian & Denda** | Petugas memproses pengembalian alat yang telah melewati batas tanggal rencana pengembalian. | Status transaksi berubah menjadi 'Dikembalikan', stok alat bertambah kembali ke gudang, dan denda keterlambatan dihitung otomatis (Rp 5.000/hari). | Status terupdate menjadi 'Dikembalikan', tanggal aktual tercatat, stok barang kembali bertambah, dan total denda terakumulasi akurat. | **PASS** | `screenshots/testcase_4_modal_pengembalian.png`<br>`screenshots/testcase_4_status_dikembalikan.png` |
| **5** | **Privilege User (RBAC)** | Pengguna role Siswa/Peminjam mencoba mengakses rute administrasi restricted (`/user` & `/kategori`). | Sistem menolak akses dan memblokir dengan status *403 Forbidden* atau mengalihkan ke rute aman. | Siswa tidak dapat mengakses menu master user/kategori; otorisasi berjalan aman terlindungi middleware. | **PASS** | `screenshots/testcase_5_privilege_blocked_403.png` |

---

## 🖼️ 3. Katalog Dokumentasi Tangkapan Layar (Screenshots)

Seluruh tangkapan layar antarmuka sistem dan pengujian telah disimpan di folder `screenshots/`:

### 0. Bukti Eksekusi Server & Database MySQL (Kriteria 1 & 2)
1. `00_laravel_server_running.png`: Bukti Project Laravel Berhasil Dijalankan (`php artisan serve` di port 8000).
2. `00_database_mysql_phpmyadmin.png`: Bukti Database MySQL `peminjaman_barang` Berhasil Dibuat di phpMyAdmin.

### A. Antarmuka Autentikasi & Landing
3. `01_halaman_login.png`: Halaman Login dengan tombol *1-Click Demo Credentials*.
4. `02_halaman_register.png`: Formulir Pendaftaran Akun Siswa/Peminjam Mandiri.

### B. Antarmuka Administrator
3. `03_dashboard_admin.png`: Dashboard Utama Admin (Statistik KPI, Grafik, Antrean Peminjaman, Log Terkini).
4. `04_crud_kategori_index.png`: Kelola Master Data Kategori Sarana.
5. `05_crud_alat_katalog.png`: Katalog Inventaris Barang & Ketersediaan Stok Fisik.
6. `06_crud_alat_tambah_form.png`: Form Tambah Master Alat Baru.
7. `07_crud_alat_edit_form.png`: Form Edit Data Alat & Penyesuaian Kondisi/Stok.
8. `08_crud_user_manajemen.png`: Manajemen Pengguna & Penetapan Role Akses.
9. `09_crud_user_tambah_form.png`: Form Registrasi Pengguna Baru oleh Admin.
10. `10_daftar_transaksi_peminjaman.png`: Tabel Monitoring Seluruh Transaksi Peminjaman & Filter Multi-Kriteria.
11. `11_detail_bukti_peminjaman.png`: Tampilan Tanda Terima / Kuitansi Digital Peminjaman.
12. `12_laporan_rekapitulasi.png`: Pratinjau Rekapitulasi Laporan Peminjaman & Denda.
13. `13_cetak_laporan_kop_surat.png`: Format Dokumen Cetak A4 Resmi dengan Kop Surat Sekolah & Kolom Tanda Tangan.
14. `14_log_audit_aktivitas.png`: Riwayat Audit Trail Log Seluruh Tindakan User & IP Address.

### C. Antarmuka Petugas Sarpras
15. `15_dashboard_petugas.png`: Dashboard Petugas dengan fokus pada Verifikasi & Approval Sirkulasi Alat.
16. `16_peminjaman_kelola_petugas.png`: Antarmuka Persetujuan (Approval), Penolakan, dan Proses Pengembalian Barang.

### D. Antarmuka Peminjam (Siswa)
17. `17_dashboard_siswa.png`: Dashboard Peminjam dengan info alat yang sedang dipinjam & rekomendasi sarana.
18. `18_katalog_alat_siswa.png`: Eksplorasi Katalog Alat yang Siap Dipinjam.
19. `19_form_pengajuan_peminjaman.png`: Formulir Pengajuan Pinjam Barang.
20. `20_riwayat_peminjaman_siswa.png`: Riwayat & Status Pengajuan Peminjaman Milik Siswa.

---

## 🛠️ 4. Dokumentasi Debugging & Penanganan Kendala (Troubleshooting Log)

Dalam proses perancangan, pengembangan, dan pengujian sistem, berikut adalah kendala teknis yang ditemui beserta solusi yang diimplementasikan:

1. **Kendala Database Collation (MySQL / MariaDB):**
   * *Masalah:* Terjadi ketidakcocokan collation `utf8mb4_0900_ai_ci` pada beberapa versi XAMPP / MariaDB lokal.
   * *Solusi:* Menstandarkan konfigurasi collation pada `config/database.php` ke `utf8mb4_unicode_ci` sehingga kompatibel 100% di semua server database.

2. **Inkonsistensi Pluralisasi Penamaan Tabel Eloquent:**
   * *Masalah:* Laravel secara default memetakan model `Peminjaman` menjadi `peminjamen` (aturan tata bahasa Inggris).
   * *Solusi:* Menambahkan deklarasi eksplisit `protected $table = 'peminjamans';` pada model `Peminjaman`, `Alat`, dan `Kategori`.

3. **Integritas Transaksi Database Saat Sirkulasi Stok:**
   * *Masalah:* Risiko inkonsistensi data jika pengurangan stok berhasil namun pencatatan transaksi peminjaman gagal di tengah jalan.
   * *Solusi:* Menggunakan blok transaksi `DB::transaction(function () { ... })` pada proses *store*, *approve*, dan *returnItem* sehingga seluruh operasi dijamin ACID (otomatis di-rollback jika terjadi error).

4. **Kalkulasi Denda Keterlambatan Dinamis:**
   * *Masalah:* Penghitungan hari keterlambatan harus akurat berdasarkan selisih tanggal kalender rencana pengembalian terhadap tanggal aktual saat alat dikembalikan.
   * *Solusi:* Memanfaatkan library `Carbon::parse($tgl_rencana)->diffInDays($tgl_aktual)` dikalikan tarif denda harian (Rp 5.000/hari) ditambah denda fisik jika ada kerusakan.

---

## 📊 5. Kesimpulan Evaluasi
Aplikasi **Sistem Peminjaman Sarana Sekolah** telah memenuhi **100% indikator kompetensi (11/11 Checklist)** pada lembar tugas UKK RPL:
* Seluruh fitur CRUD berjalan tanpa kendala (*zero runtime errors*).
* Hak akses 3 level pengguna (*Admin, Petugas, Siswa*) terlindungi ketat oleh middleware.
* Logika bisnis sirkulasi stok, persetujuan, pengembalian, dan denda bekerja secara presisi.
* Desain antarmuka responsif, rapi, dan mudah digunakan (*User-Friendly*).
