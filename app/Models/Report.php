<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
    'name', 'email', 'phone', 'category', 'location_name', 
    'latitude', 'longitude', 'description', 'image_path', 'status'
];

    // Izinkan semua kolom diisi (kecuali id dan timestamps)
    protected $guarded = ['id'];
}