<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = [
        'tgl_pengaduan',
        'nik',
        'judul',
        'isi_laporan',
        'tgl_kejadian',
        'lokasi',
        'kategori',
        'isi_laporan',
        'foto',
        'status'
    ];

    protected $dates = ['tgl_pengaduan', 'tgl_kejadian'];

    public function user()
    {
        return $this->hasOne(Masyarakat::class,'nik','nik');
    }
}

