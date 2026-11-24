# Test Matrix 

Fitur yang diuji: Search, Filter Status, Pagination, Empty State, dan Fallback tanpa JavaScript.

| No. | Skenario Pengujian        | Langkah / Input                   | Hasil Aktual                                                                          | Status   |
| --- | ------------------------- | --------------------------------- | ------------------------------------------------------------------------------------- | -------- |
| 1   | Pencarian 0 hasil         | `q=tidak-ada-xyz-999`             | Tidak ada data kursus yang cocok dan empty state ditampilkan.                         | Berhasil |
| 2   | Pencarian 1 hasil         | `q=LAR-103`                       | Tepat 1 data kursus dengan kode LAR-103 ditemukan.                                    | Berhasil |
| 3   | Lebih dari 10 hasil       | `status=open`                     | Ditemukan 13 kursus berstatus Open. Pagination membatasi 10 data per halaman.         | Berhasil |
| 4   | Keyword dengan spasi      | `q=Web Programming`               | Kursus Web Programming Lanjutan berhasil ditemukan.                                   | Berhasil |
| 5   | Filter + halaman 2        | `q=a&status=open&page=2`          | Halaman 2 menampilkan data nomor 11–13. Parameter pencarian dan filter tetap terbawa. | Berhasil |
| 6   | Fallback tanpa JavaScript | Pencarian Laravel dan filter Open | Pencarian dan filter tetap berfungsi menggunakan form GET tanpa JavaScript.           | Berhasil |

## Kesimpulan

Berdasarkan hasil pengujian, fitur pencarian, filter status, pagination, pemeliharaan parameter menggunakan `withQueryString()`, empty state, dan fallback tanpa JavaScript telah berjalan sesuai harapan. Semua skenario pengujian berhasil dilakukan pada aplikasi KursusKu.