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
        Schema::create('order', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->string("id_user")->nullable();
            $table->string('nama_user')->nullable();
            $table->string('email_user')->nullable();
            $table->text('alamat_user')->nullable();
            $table->string('id_produk')->nullable();
            $table->string('nama_produk')->nullable();
            $table->string('gambar_produk')->nullable();
            $table->string('harga_produk')->nullable();
            $table->string('kuantitas')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('order');
    }
};
