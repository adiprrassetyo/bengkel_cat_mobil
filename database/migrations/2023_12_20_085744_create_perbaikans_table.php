<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbaikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kendaraan_id');
            $table->string('kode_perbaikan');
            $table->string('judul_perbaikan');
            $table->text('keterangan');
            $table->timestamp('tanggal_masuk');
            $table->timestamp('tanggal_keluar')->nullable();
            $table->string('biaya')->nullable();
            $table->string('status');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perbaikans');
    }
};
