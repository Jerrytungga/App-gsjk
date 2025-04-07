<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    use HasFactory;
    protected $table = 'data_Universitas';
    protected $fillable = [
        'nama_universitas',
        'akreditasi',
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
