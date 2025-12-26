<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // Izinkan semua kolom diisi (kecuali id dan timestamps)
    protected $guarded = ['id'];
}