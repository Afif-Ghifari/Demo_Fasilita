# Hasil User Acceptance Testing - Kelompok 3

Anggota Kelompok:
1. `2341720144` - Danendra Nayaka Passadhi
2. `2341720176` - Farrel Muchammad Kafie
3. `2341720003` - Fatikah Salsabilla
4. `2341720168` - Muhammad Afif Al-Ghifari

Kelas: TI-3H

### F0001 – Login
| TCID   | Test Case                     | Test Steps                                                                                                                        | Expected Result                                                                                                       | Actual Result | Status |
|--------|-------------------------------|------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------|---------------|--------|
| TC0001 | Login dengan invalid credential | 1. Menuju ke halaman login<br>2. Inputkan data credential<br>3. Klik button login                                                 | Akses login ditolak menampilkan message "Gagal login, username dan password salah"                                     | As Expected   | Passed |
| TC0002 | Login dengan null credential    | 1. Menuju ke halaman login<br>2. Tidak input data credential<br>3. Klik button login                                               | Akses login ditolak menampilkan message "Harap isi username dan password"                                              | As Expected   | Passed |
| TC0003 | Login dengan valid credential   | 1. Menuju ke halaman login<br>2. Inputkan data credential<br>3. Klik button login                                                 | Berhasil login, dapat mengakses halaman home                                                                           | As Expected   | Passed |


### F0002 – Register
| TCID   | Test Case                            | Test Steps                                                                                                                                                                        | Expected Result                                                                                                   | Actual Result | Status |
|--------|----------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------|---------------|--------|
| TC0004 | Register dengan invalid credential     | 1. Menuju halaman register<br>2. Masukkan NIM/NIP<br>3. Masukkan Nama Lengkap<br>4. Masukkan Username<br>5. Masukkan Password<br>6. Masukkan Konfirmasi Password<br>7. Klik tombol "Sign Up" | Mendapatkan pesan, "Konfirmasi password tidak cocok dengan password"                                               | As Expected   | Passed |
| TC0005 | Register dengan null credential        | 1. Menuju halaman register<br>2. Klik tombol "Sign Up"                                                                                      | Mendapatkan pesan, "Harap mengisi kolom username dan password terlebih dahulu"                                      | As Expected   | Passed |
| TC0006 | Register dengan valid credential       | 1. Masukkan NIM/NIP<br>2. Masukkan Nama Lengkap<br>3. Masukkan Username<br>4. Masukkan Password<br>5. Masukkan Konfirmasi Password<br>6. Klik tombol "Sign Up" | Mendapatkan pesan berhasil, dan Registrasi Berhasil                                                                | As Expected   | Passed |

### F0003 – Penugasan Teknisi
| TCID   | Test Case                          | Test Steps                                               | Expected Result                                             | Actual Result | Status | Catatan                |
|--------|------------------------------------|-----------------------------------------------------------|--------------------------------------------------------------|---------------|--------|-------------------------|
| TC0007 | Penugasan dengan data valid        | 1. Pilih teknisi yang ditugaskan                         | Muncul modal "Berhasil"                                     | As Expected   | Passed | Menggunakan testing manual |
| TC0008 | Penugasan dengan data null         | 1. Klik tolmbol "Tugaskan"                               | Mendapatkan pesan, "Pilih item dari list terlebih dahulu"   | As Expected   | Passed |                         |


### F0004 – Verifikasi Laporan
| TCID   | Test Case                         | Test Steps                                                                                   | Expected Result                         | Actual Result | Status | Catatan                |
|--------|-----------------------------------|-----------------------------------------------------------------------------------------------|-------------------------------------------|---------------|--------|-------------------------|
| TC0009 | Verifikasi dengan data valid      | 1. Mengisi kriteria C1 hingga C6<br>2. Klik tombol "Simpan Semua"                             | Mendapat pesan, "Verifikasi berhasil"    | As Expected   | Passed | Menggunakan testing manual |
| TC0010 | Verifikasi dengan data null       | 1. Menuju halaman verifikasi<br>2. Klik tombol "Verifikasi"                                   | Mendapat pesan, harap isi terlebih dahulu | As Expected   | Passed |                         |

### F0005 – Laporan
| TCID   | Test Case                     | Test Steps                                                                                                                                                                                                 | Expected Result                                       | Actual Result | Status | Catatan                |
|--------|-------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------|---------------|--------|-------------------------|
| TC0011 | Laporan dengan data valid     | 1. Pilih gedung<br>2. Pilih lantai<br>3. Pilih ruangan<br>4. Klik tombol "tambah pelaporan"<br>5. Pilih fasilitas<br>6. Pilih tingkat kerusakan<br>7. Pilih dampak pengguna<br>8. Upload foto<br>9. Masukkan deskripsi | Mendapat pesan, "Laporan berhasil ditambahkan"        | As Expected   | Passed | Menggunakan testing manual |
| TC0012 | Laporan dengan data null      | 1. Menuju halaman verifikasi<br>2. Klik tombol "Simpan"                                                                                                             | Mendapat pesan, "buat laporan terlebih dahulu"        | As Expected   | Passed |                         |

### F0006 – Perbaikan Teknisi
| TCID   | Test Case                          | Test Steps                                                                                                       | Expected Result                  | Actual Result | Status | Catatan |
|--------|------------------------------------|-------------------------------------------------------------------------------------------------------------------|----------------------------------|---------------|--------|---------|
| TC0013 | Perbaikan dengan data valid        | 1. Memilih daftar tugas teknisi<br>2. Memasukkan file foto perbaikan<br>3. Memilih jenis perbaikan<br>4. Masukkan deskripsi<br>5. Klik tombol "Selesai" | Muncul modal "Berhasil"          | As Expected   | Passed |         |
| TC0014 | Perbaikan dengan data null         | 1. Memilih daftar tugas teknisi<br>2. Klik tombol "Selesai"                                                      | Mendapatkan pesan, "Masukkan file terlebih dahulu" | As Expected   | Passed |         |

### F0007 – Kategori Fasilitas
| TCID   | Test Case                             | Test Steps                                                      | Expected Result                                                                                           | Actual Result | Status |
|--------|----------------------------------------|------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------|---------------|--------|
| TC0015 | Penambahan dengan data null            | 1. Masukkan Kode Kategori<br>2. Masukkan Nama Kategeori         | Mendapatkan pesan, "Kode kategori harus diisi" dan "Nama Kategori harus diisi"                             | As Expected   | Passed |
| TC0016 | Penambahan dengan data invalid         | 1. Masukkan Kode Kategori<br>2. Masukkan Nama Kategeori         | Mendapakan pesan "terjadi Kesalahan, Kode kategori sudah digunakan"                                        | As Expected   | Passed |
| TC0017 | Penambahan dengan data valid           | 1. Masukkan Kode Kategori<br>2. Masukkan Nama Kategeori         | Mendapatkan pesan "Berhasil, Data kategori fasilitas berhasil disimpan"                                    | As Expected   | Passed |
| TC0018 | Pengeditan dengan data null            | 1. Masukkan Kode Kategori<br>2. Masukkan Nama Kategeori         | Mendapatkan pesan, "Kode kategori harus diisi" dan "Nama Kategori harus diisi"                             | As Expected   | Passed |
| TC0019 | Pengeditan dengan data invalid         | 1. Masukkan Kode Kategori<br>2. Masukkan Nama Kategeori         | Mendapakan pesan "Kode sudah digunakan"                                                                    | As Expected   | Passed |
| TC0020 | Pengeditan dengan data valid           | 1. Masukkan Kode Kategori<br>2. Masukkan Nama Kategeori         | Mendapatkan pesan "Berhasil, Data kategori fasilitas berhasil diperbarui"                                   | As Expected   | Passed |
| TC0021 | Penghapusan data                       | 1. Menekan icon hapus                                           | Mendapatkan pesan, "Data berhasil dihapus"                                                                 | As Expected   | Passed |
