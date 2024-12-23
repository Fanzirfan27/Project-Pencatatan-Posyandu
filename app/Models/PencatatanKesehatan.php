<?php

namespace App\Models;

use App\Models\AnggotaPosyandu;
use App\Models\JenisPemeriksaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PencatatanKesehatan extends Model
{
    use HasFactory;

    protected $table = 'pencatatan_kesehatan';
    protected $primaryKey = 'id_pencatatan_kesehatan';
    protected $fillable = ['fk_id_anggota', 'fk_jenis_pemeriksaan', 'tanggal_pemeriksaan'];

    public function anggotaPosyandu()
    {
        return $this->belongsTo(AnggotaPosyandu::class, 'fk_id_anggota');
    }

    public function jenisPemeriksaan()
    {
        return $this->belongsTo(JenisPemeriksaan::class, 'fk_jenis_pemeriksaan');
    }
    public function kategoriAnggota()
    {
        return $this->hasOneThrough(
            KategoriAnggota::class,
            AnggotaPosyandu::class,
            'id_anggota',          // Foreign key di tabel anggota_posyandu
            'id_kategori_anggota', // Foreign key di tabel kategori_anggota
            'fk_id_anggota',       // Local key di tabel pencatatan_kesehatan
            'kategori_anggota'     // Local key di tabel anggota_posyandu
        );
    }

}
