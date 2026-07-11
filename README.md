# 📦 Inventaris Dapur

Aplikasi web sederhana untuk mencatat dan mengelola stok bahan-bahan dapur (seperti bumbu, protein, bahan susu, dll). Cocok dipakai untuk dapur rumahan, katering kecil, atau restoran yang ingin tahu bahan apa saja yang tersedia dan berapa jumlahnya, tanpa perlu mencatat manual di kertas.

🔗 **Coba langsung:** [inventaris-dapur.rf.gd/PRAKTIK/tampilan.php](https://inventaris-dapur.rf.gd/PRAKTIK/tampilan.php?i=1)

---

## 🧾 Tentang Aplikasi Ini

Bayangkan aplikasi ini seperti **buku catatan stok dapur, tapi versi digital**. Alih-alih menulis di kertas atau buku tulis "Telur Ayam - 30 butir", semua data disimpan rapi di dalam sebuah tabel di website, dan bisa diubah/dihapus kapan saja hanya dengan beberapa klik.

Karena aplikasi ini berbentuk **web** (bukan aplikasi yang harus di-download), siapa pun bisa membukanya lewat browser (Chrome, Firefox, dll) tanpa perlu instalasi apa pun — cukup buka link-nya saja.

---

## ✨ Fitur & Ulasan

### 1. 📋 Lihat Daftar Bahan
Halaman utama menampilkan semua bahan dapur dalam bentuk tabel yang rapi, lengkap dengan kolom: **Nama Bahan**, **Kategori** (misalnya Protein, Bumbu, Dairy), **Stok**, dan **Satuan** (kg, gram, butir, ikat, dll).

> 💬 *Ulasan:* Tampilannya bersih dan mudah dibaca — cocok buat yang tidak terbiasa dengan sistem rumit. Setiap kategori diberi label warna hijau kecil supaya gampang dikenali sekilas.

### 2. 🔎 Filter Berdasarkan Kategori
Ada dropdown "Semua Kategori" di bagian atas tabel, yang memungkinkan pengguna menyaring daftar bahan berdasarkan jenisnya (misalnya hanya menampilkan bahan kategori "Bumbu" saja).

> 💬 *Ulasan:* Fitur ini sangat membantu kalau daftar bahan sudah banyak — jadi tidak perlu scroll panjang untuk mencari satu jenis bahan tertentu.

### 3. ➕ Tambah Bahan Baru
Tombol **"+ Bahan Baru"** di pojok kanan atas akan membuka form untuk menambahkan bahan dapur baru. Pengguna tinggal mengisi kategori, nama bahan, jumlah stok, dan satuannya, lalu klik **"Simpan Data"**.

> 💬 *Ulasan:* Form-nya simpel, cuma 4 kolom isian. Pengguna awam pun tidak akan bingung karena setiap kolom sudah diberi contoh (placeholder) seperti "Contoh: Bawang Putih".

### 4. ✏️ Edit Bahan
Setiap baris data punya tombol **"Edit"** berwarna kuning. Saat diklik, akan muncul form yang sudah otomatis terisi dengan data lama, sehingga pengguna tinggal mengubah bagian yang perlu diperbarui saja (misalnya update jumlah stok setelah belanja).

> 💬 *Ulasan:* Sangat praktis — tidak perlu mengetik ulang semua data dari awal, cukup ubah angka stoknya lalu simpan.

### 5. 🗑️ Hapus Bahan
Tombol **"Hapus"** berwarna merah akan menghapus data bahan dari daftar. Sebelum benar-benar terhapus, akan muncul kotak konfirmasi bertuliskan **"Yakin?"** agar tidak ada data yang terhapus secara tidak sengaja.

> 💬 *Ulasan:* Adanya konfirmasi sebelum menghapus adalah nilai plus, karena mencegah kesalahan klik yang bisa menghapus data penting.

---

## 🛠️ Teknologi yang Digunakan

| Bagian | Teknologi |
|---|---|
| Bahasa pemrograman | PHP |
| Database | MySQL (dikelola lewat phpMyAdmin) |
| Tampilan (styling) | Bootstrap 5 + font Poppins |
| Hosting | rf.gd (hosting gratis) |

---

## 🖱️ Cara Menggunakan (Untuk Pengguna Biasa)

Tidak perlu instalasi apa pun, cukup ikuti langkah berikut lewat browser:

1. **Buka link aplikasi** di atas.
2. Untuk **melihat stok**, cukup lihat tabel yang muncul di halaman utama (`tampilan.php`).
3. Untuk **menyaring bahan** berdasarkan kategori, klik dropdown "Semua Kategori" dan pilih kategori yang diinginkan.
4. Untuk **menambah bahan baru**, klik tombol **"+ Bahan Baru"**, isi form, lalu klik **"Simpan Data"**.
5. Untuk **mengubah data** (misalnya update stok), klik **"Edit"** di baris bahan yang ingin diubah, lalu klik **"Simpan Perubahan"**.
6. Untuk **menghapus bahan**, klik **"Hapus"**, lalu konfirmasi dengan klik **"OK"** pada kotak yang muncul.

---

## 💻 Struktur Kode (Untuk yang Ingin Menjalankan di Komputer Sendiri)

Jika ingin menjalankan proyek ini secara lokal (misalnya lewat XAMPP/Laragon), berikut file-file utamanya:

```
📁 PRAKTIK/
 ├── koneksi.php     # Berisi pengaturan koneksi ke database MySQL
 ├── tampilan.php    # Halaman utama, menampilkan daftar bahan dapur
 ├── tambah.php      # Form untuk menambahkan bahan baru
 ├── edit.php        # Form untuk mengedit bahan yang sudah ada
 └── hapus.php       # Proses untuk menghapus data bahan
```

**Langkah menjalankan secara lokal:**

1. Install aplikasi server lokal seperti **XAMPP** atau **Laragon**.
2. Letakkan seluruh folder proyek ke dalam folder `htdocs` (jika pakai XAMPP).
3. Buka **phpMyAdmin**, buat database baru, lalu buat dua tabel berikut:
   - `kategori_bahan` — menyimpan daftar kategori (misalnya Protein, Bumbu, Dairy).
   - `bahan_baku` — menyimpan data bahan dapur (nama, stok, satuan, dan kategori).
4. Sesuaikan nama database, username, dan password di file `koneksi.php` dengan pengaturan database di komputer kamu.
5. Jalankan Apache & MySQL dari XAMPP, lalu buka `http://localhost/PRAKTIK/tampilan.php` di browser.

---

## 🗂️ Struktur Database

**Tabel `kategori_bahan`**
| Kolom | Keterangan |
|---|---|
| id_kategori | ID unik kategori |
| nama_kategori | Nama kategori (contoh: Protein, Bumbu) |

**Tabel `bahan_baku`**
| Kolom | Keterangan |
|---|---|
| id_bahan | ID unik bahan |
| id_kategori | Menghubungkan ke tabel kategori_bahan |
| nama_bahan | Nama bahan dapur |
| stok | Jumlah stok saat ini |
| satuan | Satuan bahan (kg, gram, butir, dll) |

---

## 📌 Rencana Pengembangan Selanjutnya
- Menambahkan fitur pencarian bahan berdasarkan nama
- Menambahkan notifikasi jika stok bahan hampir habis
- Menambahkan sistem login agar hanya orang tertentu yang bisa mengubah data
