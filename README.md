# TP9DPBO2025C1

## Janji
Saya Mochamad Zidan Rusdhiana dengan NIM 2305464 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Struktur Arsitektur MVP

MVP (Model-View-Presenter) adalah pola arsitektur pengembangan perangkat lunak yang memisahkan komponen aplikasi menjadi tiga bagian utama:

1. **Model**: Berisi logika bisnis dan data aplikasi
2. **View**: Bertanggung jawab untuk menampilkan informasi kepada pengguna
3. **Presenter**: Berperan sebagai perantara antara Model dan View

## Komponen-Komponen Program

### 1. Model

Model terdiri dari beberapa kelas yang menangani data dan logika bisnis:

- **DB.class.php**: Kelas dasar untuk operasi database (koneksi, eksekusi query, dsb)
- **Mahasiswa.class.php**: Kelas yang merepresentasikan entitas mahasiswa dengan atribut-atributnya
- **TabelMahasiswa.class.php**: Kelas yang menangani operasi CRUD (Create, Read, Update, Delete) untuk data mahasiswa

### 2. View

View bertanggung jawab untuk menampilkan data:

- **KontrakView.php**: Interface yang mendefinisikan fungsi tampil()
- **TampilMahasiswa.php**: Implementasi KontrakView yang menampilkan daftar mahasiswa
- **Template.class.php**: Kelas untuk mengelola template HTML

### 3. Presenter

Presenter berperan sebagai perantara antara Model dan View:

- **KontrakPresenter.php**: Interface yang mendefinisikan fungsi-fungsi yang harus diimplementasikan
- **ProsesMahasiswa.php**: Implementasi KontrakPresenter yang menghubungkan Model dan View

### 4. Halaman Aplikasi

- **index.php**: Halaman utama yang menampilkan daftar mahasiswa
- **form.php**: Halaman untuk menambah dan mengubah data mahasiswa

## Alur Program

### 1. Inisialisasi

Alur dimulai dari `index.php` atau `form.php` yang melakukan:
- Import file yang diperlukan
- Inisialisasi objek-objek yang dibutuhkan

### 2. Proses CRUD

Program mendukung operasi CRUD pada data mahasiswa:

#### Create (Tambah)
1. Pengguna mengisi formulir di `form.php`
2. Form disubmit dengan action "tambah"
3. `ProsesMahasiswa` memanggil `addMahasiswa()` yang menjalankan query INSERT
4. Pengguna diarahkan kembali ke halaman utama

#### Read (Baca)
1. Saat `index.php` diakses, objek `TampilMahasiswa` dibuat
2. `TampilMahasiswa` memanggil `prosesDataMahasiswa()` dari `ProsesMahasiswa`
3. `ProsesMahasiswa` mengambil data dari database melalui `TabelMahasiswa`
4. Data diolah dan ditampilkan dalam bentuk tabel HTML

#### Update (Ubah)
1. Pengguna mengklik tombol "Edit" pada tabel
2. `form.php` menerima ID mahasiswa via parameter GET
3. Data mahasiswa dengan ID tersebut diambil dan ditampilkan di form
4. Pengguna mengubah data dan submit form dengan action "update"
5. `ProsesMahasiswa` memanggil `updateMahasiswa()` untuk memperbarui data
6. Pengguna diarahkan kembali ke halaman utama

#### Delete (Hapus)
1. Pengguna mengklik tombol "Hapus" pada tabel
2. Konfirmasi via JavaScript
3. Jika dikonfirmasi, `index.php` menerima ID mahasiswa via parameter GET
4. `ProsesMahasiswa` memanggil `deleteMahasiswa()` untuk menghapus data
5. Halaman di-refresh untuk menampilkan data terbaru

## Dokumentasi


https://github.com/user-attachments/assets/9e69bc55-f43c-4eb2-a777-9b15eb6120dd

