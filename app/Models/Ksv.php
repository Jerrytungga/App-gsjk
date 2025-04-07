<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ksv extends Model
{
    use HasFactory;
    protected $table = 'dataKsv';
    protected $fillable = [
        'nama',
        'gender',
        'usia',
        'telepon',
        'alamat',
        'tgl_lahir',
        'tgl_baptis',
        'lokal',
        'created_at',
        'updated_at',
        ];
        protected $casts = [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];


    
}
