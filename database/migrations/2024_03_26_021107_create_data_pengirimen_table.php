<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_pengirimen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai');
            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->string('tanggal_dikirin')->nullable();
            $table->string('photo_penyerahan')->nullable();
            $table->string('harga')->nullable();
            $table->enum('status',['proses','dikirim','terkirim']);
            $table->timestamps();

            $table->foreign('id_pegawai')->references('id')->on('data_pegawais');
            $table->foreign('id_pelanggan')->references('id')->on('data_pelanggans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pengirimen');
    }
};
