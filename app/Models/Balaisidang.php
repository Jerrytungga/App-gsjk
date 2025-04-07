<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balaisidang extends Model
{
    use HasFactory;

    protected $table = 'balai_sidang';
    protected $fillable = ['id', 'lokal', 'alamat', 'lokasi', 'kontak', 'created_at', 'updated_at'];
}
