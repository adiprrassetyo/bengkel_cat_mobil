# Sistem Informasi Bengkel Cat

Project ini merupakan tugas akhir kelompok Pemrograman Lanjutan

Dibangun menggunakan

-   Laravel 9
-   Bootsrap 5

# Sistem Informasi Bengkel Cat

![1aYOQHg - Imgur](https://github.com/adiprrassetyo/bengkel_cat_mobil/assets/68819530/62f1aed0-1e6a-4107-8e26-bf6a09b5b9fe)

![8IBXuR4 - Imgur](https://github.com/adiprrassetyo/bengkel_cat_mobil/assets/68819530/15b6f1d4-77c3-4a0d-9176-9d28af93e405)

![662HnAN - Imgur](https://github.com/adiprrassetyo/bengkel_cat_mobil/assets/68819530/8e0614b4-704d-4cac-8a9d-252abca76019)

![xB6PSxU - Imgur](https://github.com/adiprrassetyo/bengkel_cat_mobil/assets/68819530/5bdbb3d0-6d73-42dc-8996-84a72e703735)

![L3v01ur - Imgur](https://github.com/adiprrassetyo/bengkel_cat_mobil/assets/68819530/38f3a330-a2fa-47c2-9c61-989d7aadeacd)

![nDI2gQr - Imgur](https://github.com/adiprrassetyo/bengkel_cat_mobil/assets/68819530/e6c78123-17bc-4d23-b45d-d3e702a2c37d)

## Default Account for testing

**Admin Default Account**

-   username : admin1
-   Password : admin123

**User Default Account**

-   username : Saiful1
-   Password : user123

**Owner Default Account**

-   username : Adam1
-   Password : owner123

## Deployment

To deploy this project

1. **Clone Repository**

```bash
  git clone https://github.com/adiprrassetyo/bengkel_cat_mobil

  cd bengkel_cat_mobil

  composer install
```

2. **Buat file `.env`**

```bash
  cp .env.example .env
```

3. **Buka `.env` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai**

```bash
  DB_PORT=3306
  DB_DATABASE=pemrolanjut
  DB_USERNAME=root
  DB_PASSWORD=
```

4. **Buka `.env` lalu tambahkan baris berikut**

```bash
  TIMEZONE=Asia/Jakarta
  INDONESIA=id
  FAKER_LOCALE=id_ID
  FILESYSTEM_DISK=public
```

5. **Generate app key**

```bash
  php artisan key:generate
```

6. **Jalankan migration dan seeder**

```bash
  php artisan migrate --seed
```

7. **Jalankan storage link**

```bash
  php artisan storage:link
```

8. **Jalankan website**

```bash
  php artisan serve
```
