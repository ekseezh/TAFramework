<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minuman extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_minum', 
        'kode_minum',
        'harga_minum',
        'jumlah_minum',
    ];
}
