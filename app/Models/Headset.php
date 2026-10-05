<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headset extends Model
{
    use HasFactory;

    protected $table = 'headset';

    protected $fillable = ['nama', 'harga', 'gambar'];
}
