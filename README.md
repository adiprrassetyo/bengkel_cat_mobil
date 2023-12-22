# Sistem Informasi Bengkel Cat

Project ini merupakan tugas akhir kelompok Pemrograman Lanjutan

Dibangun menggunakan

-   Laravel 9
-   Bootsrap 5

# Sistem Informasi Bengkel Cat

![screencapture-si-bengkel-test-2023-12-20-18_33_08](https://imgur.com/1aYOQHg)

![screencapture-si-bengkel-test-manage-users-2023-12-20-18_35_17](https://imgur.com/8IBXuR4)

![screencapture-si-bengkel-test-manage-menu-2023-12-20-18_34_59 (1)](https://imgur.com/662HnAN)

![screencapture-si-bengkel-test-manage-users-2023-12-20-18_35_28](https://imgur.com/xB6PSxU)

![screencapture-si-bengkel-test-manage-berita-add-2023-12-20-18_36_31](https://imgur.com/L3v01ur)

![screencapture-si-bengkel-test-show-myVehicle-repairs-1-OxttPglVM7-2023-12-20-18_41_04](https://imgur.com/nDI2gQr)

## Default Account for testing

**Admin Default Account**

-   username : admin1
-   Password : admin123

**User Default Account**

-   username : Saiful1
-   Password : user123

**Owner Default Account**

-   username : Adam01
-   Password : owner123

## Deployment

To deploy this project

1. **Clone Repository**

```bash
  git clone https://github.com/adiprrassetyo/bengkel_cat_mobil

  cd bengkel-cat-berbasis

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
