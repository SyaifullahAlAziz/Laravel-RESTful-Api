<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarcisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karcis', function (Blueprint $table) {
            $table->increments('id_karcis');
            $table->integer('id_kategori');
            $table->string('nama');
            $table->string('deskripsi');
            $table->integer('harga');
            $table->date('tanggal');
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('karcis');
    }
}
