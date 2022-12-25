<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karcisapp extends Model
{
    use HasFactory;
    protected $table = 'karcis';
    protected $fillable = [
        'id_kategori',
        'nama',
        'deskripsi',
        'harga',
    ];
}
