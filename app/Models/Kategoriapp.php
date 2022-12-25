<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriapp extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = [
        'nama_kategori',
        'harga',
    ];
}
