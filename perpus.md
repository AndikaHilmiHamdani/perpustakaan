## Table List

- #### Table user

  | key  | table name |
  | :--: | :--------- |
  |  PK  | id         |
  |      | name       |
  |      | email      |
  | .... | .......... |

- #### Table buku

  | key | table name                       |
  | :-: | :------------------------------- |
  | PK  | kode_buku                        |
  |     | judul                            |
  |     | pengarang                        |
  |     | tahun_terbit                     |
  |     | penerbit                         |
  |     | stock                            |
  |     | jumlah (ga disimpen di database) |

- #### Table transaksi

  | key | table name                 |
  | :-: | :------------------------- |
  | PK  | trx_id                     |
  | FK  | kode_buku (buku.kode_buku) |
  |     | tanggal_pinjam             |
  |     | tanggal_kembali            |
  | FK  | user_id (user.id)          |

---

## Hitung jumlah buku tersedia

Rumus: `stock - jumlah buku yg dipinjam`
Query:

```sql
SELECT buku.kode_buku,
       judul,
       pengarang,
       tahun_terbit,
       penerbit,
       (buku.stock - count(trx.id)) AS jumlah
FROM buku
JOIN transaksi trx ON trx.kode_buku = buku.kode_buku
WHERE trx.tanggal_kembali IS NULL
GROUP BY buku.kode_buku, judul, pengarang, tahun_terbit, penerbit
```

---

## Hitung jumlah hari peminjaman

Rumus: `tanggal_kembali - tanggal_pinjam`
Query:

```sql
SELECT *,
       DATEDIFF(COALESCE(tanggal_kembali, NOW()), tanggal_pinjam) AS lama_pinjam
FROM transaksi trx
```

## Kirim notifikasi email

Menggunakan laravel scheduling setiap hari pada pukul 00:00
Misalkan max hari peminjaman = 5 hari
Query:

```sql
SELECT judul,
       pengarang,
       tahun_terbit,
       penerbit,
       nama,
       email,
       DATEDIFF(NOW(), tanggal_pinjam) AS lama_pinjam
FROM transaksi trx
JOIN user ON user.id = trx.user_id
JOIN buku ON buku.kode_buku = trx.kode_buku
WHERE tanggal_kembali IS NULL
      AND DATEDIFF(NOW(), tanggal_pinjam) > 5
```
