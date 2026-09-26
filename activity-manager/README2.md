# Activity Manager (Modul 3)

Proyek ini adalah aplikasi manajemen kegiatan (Activity Manager) berbasis Laravel 13 yang dikembangkan sebagai bagian dari praktikum Pemrograman Web / Framework. Aplikasi ini mengimplementasikan operasi CRUD, validasi data, *Service Layer Pattern*, serta *Static Analysis*.

## Fitur Utama

- **CRUD Kegiatan**: Tambah, Lihat (Index & Detail), Edit, dan Hapus kegiatan.
- **Filter Status**: Menyaring daftar kegiatan berdasarkan status (`Planned`, `Ongoing`, `Done`) menggunakan Query String URL.
- **Validasi Form Request**: Penegakan *Business Rules* menggunakan `StoreActivityRequest` dan `UpdateActivityRequest`.
- **Service Layer Pattern**: Pemisahan logika bisnis (aturan transisi status kegiatan) dari Controller ke `ActivityService` (Prinsip SRP).
- **Route Model Binding**: Mempermudah pemanggilan instance model secara langsung melalui route.
- **Clean Code & Static Analysis**: Kode dirapikan secara otomatis dengan **Laravel Pint** dan lolos pengecekan *static analysis* dari **SonarQube for IDE**.

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Laravel 13.x
- Ekstensi PDO SQLite / MySQL

## Langkah Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di *local environment*:

1. **Clone Repository**
   ```bash
   git clone https://github.com/sahizidanlukman/MODUL3-6_PROYEK-3.git
   cd nama-folder-proyek