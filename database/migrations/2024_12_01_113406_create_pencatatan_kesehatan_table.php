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
        Schema::create('pencatatan_kesehatan', function (Blueprint $table) {
            $table->id('id_pencatatan_kesehatan'); // Primary Key
            $table->unsignedBigInteger('fk_id_anggota'); // Foreign Key ke tabel anggota_posyandu
            $table->date('tanggal_pemeriksaan'); // Tanggal pemeriksaan
            $table->unsignedBigInteger('fk_jenis_pemeriksaan'); // Foreign Key ke tabel jenis_pemeriksaan
            $table->timestamps();

            // Relasi ke tabel anggota_posyandu
            $table->foreign('fk_id_anggota')
                ->references('id_anggota')
                ->on('anggota_posyandu')
                ->onDelete('cascade');

            // Relasi ke tabel jenis_pemeriksaan
            $table->foreign('fk_jenis_pemeriksaan')
                ->references('id_jenis_pemeriksaan')
                ->on('jenis_pemeriksaan')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencatatan_kesehatan');
    }
};
