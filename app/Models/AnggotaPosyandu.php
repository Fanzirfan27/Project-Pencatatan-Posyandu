<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaPosyandu extends Model
{
    use HasFactory;

    protected $table = 'anggota_posyandu';
    protected $primaryKey = 'id_anggota';
    protected $fillable = ['nama_anggota', 'kategori_anggota', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_telepon'];

    public function kategori()
    {
        return $this->belongsTo(KategoriAnggota::class, 'kategori_anggota', 'id_kategori_anggota');
    }
    public function pencatatanKesehatan()
    {
        return $this->hasMany(PencatatanKesehatan::class, 'fk_id_anggota');
    }
}
