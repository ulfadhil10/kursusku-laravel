
# Hasil Pengujian KursusKu

| No. | Skenario Pengujian | Data Uji | Hasil Aktual | Status |
|---|---|---|---|---|
| 1 | Memasukkan data valid | WEB-101, Web Dasar | Data berhasil disimpan dan tampil di halaman daftar kursus. | Lulus |
| 2 | Kode kursus kosong | Kode dikosongkan | Muncul pesan "The code field is required." | Lulus |
| 3 | Kode kursus duplikat | WEB-101 | Muncul pesan validasi kode duplikat dan data tidak disimpan. | Lulus |
| 4 | Nama kursus kosong | TEST-001, nama dikosongkan | Muncul pesan "The name field is required." | Lulus |
| 5 | Biaya negatif | TEST-002, biaya -1000 | Muncul pesan "The fee field must be at least 0." | Lulus |
| 6 | Kuota bernilai 0 | TEST-003, kuota 0 | Muncul pesan "The quota field must be at least 1." | Lulus |
| 7 | Status tidak valid | TEST-004, status active | Muncul pesan "The selected status is invalid." | Lulus |
| 8 | Memuat ulang halaman daftar kursus | Reload halaman /courses | Seluruh 8 data kursus tetap tampil. | Lulus |

## Kesimpulan

Berdasarkan delapan pengujian yang dilakukan, fitur Create dan Read pada aplikasi KursusKu berjalan sesuai harapan. Validasi berhasil menolak data yang tidak sesuai dengan aturan, sedangkan data yang telah tersimpan tetap dapat ditampilkan setelah halaman dimuat ulang.
