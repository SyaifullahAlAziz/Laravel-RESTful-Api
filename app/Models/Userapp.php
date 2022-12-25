<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userapp extends Model
{
    use HasFactory;
    protected $table = 'userapps';
    protected $fillable = [
        'nama',
        'no_telpon',
        'alamat',
        'email',
        'jenis_kelamin',
    ];
}
