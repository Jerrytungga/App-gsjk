<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSidang extends Model
{
    use HasFactory;
    protected $table = 'jadwal_sidang'; // Nama tabel

    protected $fillable = [
        'nama_sidang',
        'hari',
        'waktu_mulai',
        'waktu_akhir',
        'tempat',
        'deskripsi'
    ];
}
