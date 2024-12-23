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
        Schema::create('anggota_posyandu', function (Blueprint $table) {
            $table->id('id_anggota');
            $table->string('nama_anggota');
            $table->unsignedBigInteger('kategori_anggota'); // Kolom foreign key
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('alamat');
            $table->string('no_telepon')->nullable();
            $table->timestamps();

            // Relasi ke kolom 'id_kategori_anggota'
            $table->foreign('kategori_anggota')
                ->references('id_kategori_anggota')
                ->on('kategori_anggota')
                ->onDelete('cascade');
        });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_posyandu');
    }
};
