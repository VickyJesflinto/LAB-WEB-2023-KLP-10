<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    // hasfactory >> pembuatan data awal yang dapat digunakan untuk mengisi tabel-tabel dalam basis data
    use HasFactory;
    
    protected $guarded = ['id'];    //akses db
}
