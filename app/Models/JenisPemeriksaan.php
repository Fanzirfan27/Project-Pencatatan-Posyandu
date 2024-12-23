<?php

namespace App\Models;

use App\Models\PencatatanKesehatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisPemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'jenis_pemeriksaan';
    protected $primaryKey = 'id_jenis_pemeriksaan';
    protected $fillable = ['nama_jenis_pemeriksaan'];

    public function pencatatanKesehatan()
    {
        return $this->hasMany(PencatatanKesehatan::class, 'fk_jenis_pemeriksaan');
    }
}
