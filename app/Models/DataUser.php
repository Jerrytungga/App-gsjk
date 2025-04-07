<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    use HasFactory;
    protected $table = 'dataUser';
    protected $fillable = [
        'ktp',
        'nama',
        'telepon',
        'pelayanan',
        'lokal',
        'akses',
        'username',
        'password',
        'created_at',
        'updated_at',
        ];
        protected $casts = [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
}
