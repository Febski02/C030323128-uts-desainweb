<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bahanbaku extends Model
{
    use HasFactory;
    protected $fillable = [ 'nama_bahan','stok','harga','kategori' ,'image', 
    
];
    
    
}
