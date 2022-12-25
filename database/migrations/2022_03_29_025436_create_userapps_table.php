<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userapps', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_telpon');
            $table->string('alamat');
            $table->string('email');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
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
        Schema::dropIfExists('userapps');
    }
}
