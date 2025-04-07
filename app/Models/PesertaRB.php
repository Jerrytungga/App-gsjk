<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaRB extends Model
{
    use HasFactory;
    protected $table = 'data_peserta_rb';

    protected $fillable = [
        'nama_siswa',
        'gender',
        'sekolah',
        'kelas',
        'agama',
        'lokal',
        'tgl_terdaftar'
    ];
}
