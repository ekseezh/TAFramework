<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_makan', 
        'kode_makan',
        'harga_makan',
        'jumlah_makan',
    ];
}
