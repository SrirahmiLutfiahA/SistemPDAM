<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id');
            $table->string('nopelanggan');
            $table->string('nama');
            $table->string('alamat');
            $table->string('kategori');
            $table->string('keterangan');
            $table->string('fotoaduan');
            $table->string('status')->default('DIPROSES');
            $table->string('balasan')->default('BELUM ADA');
            $table->string('fotobalasan')->default('BELUM ADA');
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
        Schema::dropIfExists('pengaduan');
    }
}
