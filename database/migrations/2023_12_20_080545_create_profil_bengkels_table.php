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
        Schema::create('profil_bengkels', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('body');
            $table->string('foto')->nullable();
            $table->text('alamat');
            $table->string('no_telp');
            $table->text('maps_link')->nullable();
            $table->text('wa_link')->nullable();
            $table->text('fb_link')->nullable();
            $table->text('ig_link')->nullable();
            $table->text('twt_link')->nullable();
            $table->string('c_img1')->nullable();
            $table->string('c_img2')->nullable();
            $table->string('c_img3')->nullable();
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
        Schema::dropIfExists('profil_bengkels');
    }
};
