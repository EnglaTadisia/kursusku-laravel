**Nama aplikasi:** KursusKu

| No. | Test Case | Input | Hasil Aktual | Status |
|---|---|---|---|---|
| 1 | Simpan data valid | Kode WEB-101, nama Web Dasar, biaya 200000, kuota 30 | Data berhasil disimpan dan muncul pesan sukses | Lulus |
| 2 | Kode kosong | Kode dikosongkan | Muncul pesan validasi | Lulus |
| 3 | Kode duplikat | WEB-101 | Data ditolak karena kode sudah digunakan | Lulus |
| 4 | Nama kosong | Nama dikosongkan | Muncul pesan validasi | Lulus |
| 5 | Biaya negatif | -1000 | Data ditolak | Lulus |
| 6 | Kuota nol | 0 | Data ditolak | Lulus |
| 7 | Status tidak valid | active | Data ditolak | Lulus |
| 8 | Reload halaman | Tekan F5 pada /courses | Data tetap tersimpan | Lulus |
