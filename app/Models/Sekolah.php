<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'data_Sekolah';
    protected $fillable = [
        'nama_sekolah',
        'kategori',
        'lokasi',
        'lokal',
        'created_at',
        'updated_at',
        ];
        protected $casts = [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];

}
