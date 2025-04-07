<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileAdministrasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_file', 'kategori_file', 'file_path'
    ];
}
