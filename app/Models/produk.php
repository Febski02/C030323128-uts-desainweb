<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class produk extends Model
{
    use HasFactory;
    protected $fillable = [ 'nama_produk','deskripsi','harga','kategori' ,
    
    
];
    
}
