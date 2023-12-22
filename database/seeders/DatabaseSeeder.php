<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Perbaikan;
use App\Models\Progres;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\ProfilBengkel;
use App\Models\Layanan;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nik' => '4321432143214321',
            'nama' => 'Adi Prasetyo',
            'alamat' => 'Bukit Indah, Lhokseumawe',
            'jenis_kelamin' => 'L',
            'tanggal_lahir' => '2002-02-14',
            'no_telp' => '089696764576',
            'role' => 'admin',
            'username' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        User::create([
            'nik' => '9876987698769876',
            'nama' => 'Saiful',
            'alamat' => 'Bireun, Aceh',
            'jenis_kelamin' => 'L',
            'tanggal_lahir' => '2002-05-02',
            'no_telp' => '087751994281',
            'role' => 'user',
            'username' => 'Saiful1',
            'email' => 'saiful@yahoo.com',
            'password' => bcrypt('user123')
        ]);

        User::create([
            'nik' => '1234123412341234',
            'nama' => 'Adam',
            'alamat' => 'Langkat, Sumut',
            'jenis_kelamin' => 'L',
            'tanggal_lahir' => '2002-06-13',
            'no_telp' => '0895705724747',
            'role' => 'owner',
            'username' => 'Adam01',
            'email' => 'adam01@gmail.com',
            'password' => bcrypt('owner123')
        ]);

        Kendaraan::create([
            'user_id' => 2,
            'no_plat' => 'AE 123 EA',
            'merek' => 'Hoda',
            'model' => 'SUV',
            'warna' => 'Putih'
        ]);


        ProfilBengkel::create([
            'judul' => 'Bengkel Cat Saifol',
            'body' => 'Kami adalah penyedia layanan body repair untuk kendaraan anda. Apa itu Body Repair ? Body repair adalah perbaikan terhadap body kendaraan yang mengalami berbagai jenis kerusakan mulai dari yang ringan sampai yang berat. Selama penggunaan sehari-hari tentu saja body kendaraan yang kita miliki dapat mengalami kerusakan yang bermacam tipenya. Seperti saat body kendaraan kita terkena ranting kayu ketika melewati area hutan, maka bisa saja muncul goresan yang dapat menggores lapisan coating dan cat. Kerusakan lainya yang biasanya terjadi adalah akibat kecelakaan sehingga mengakibatkan penyok terhadap body kendaraan. Tingkat penyok sendiri ada yang ringan dan parah, jika terjadi hanya pada bagian bumper mobil saja, maka masih termasuk ringan dan mudah diperbaiki. Berbeda jika kecelakaan merusak bagian pintu mobil, kap mesin atau pintu belakang sehingga tidak bisa dibuka, maka diperlukan perbaikan secara menyeluruh jika kerusakannya tergolong berat.',
            'alamat' => 'Simpang Line, Lhokseumawe',
            'no_telp' => '089696764576',
            'maps_link' =>'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254306.31587912352!2d96.9284313318895!3d5.178029809564594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304777c3b55d7709%3A0x75d244d07b5ef6e8!2sBakti%20Bengkel!5e0!3m2!1sen!2sid!4v1703255321242!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ]);

        Layanan::create([
            'profil_bengkel_id' => 1,
            'judul' => 'Pengecatan seluruh body mobil',
            'keterangan' => 'Untuk biaya pengecatan full body dengan menggunakan bahan seperti Nippont Paint, Apsara maupun Blinken dan DuPont, maka kamu perlu menyiapkan biaya mulai dari Rp.4.000.000,00. Tentunya ini juga bergantung dengan kondisi bodi mobil serta pilihan warna yang diinginkan.',
            'harga' => '4000000',
        ]);
        Layanan::create([
            'profil_bengkel_id' => 1,
            'judul' => 'Pengecatan bagian bumper depan dan belakang',
            'keterangan' => 'Biasanya bagian bumper adalah bagian yang rawan terkena goresan atau penyok karena memang berfungsi untuk menahan benturan. Untuk memoles bagian bumper, biaya yang harus kamu siapkan sekitar ',
            'harga' => '600000',
        ]);


        // User::factory(12)->create();

        // Kendaraan::factory(15)->create();

        // Perbaikan::factory(15)->create();

        // Progres::factory(15)->create();

        // Berita::factory(15)->create();

        // Layanan::factory(5)->create();

    }
}
