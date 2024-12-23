<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;
    protected $table = 'sarans';
    // Menentukan kolom yang bisa diisi
    protected $fillable = ['nama', 'saran', 'waktu', 'created_at', 'updated_at'];

    // Jika Anda menggunakan timestamps otomatis, pastikan untuk menambahkan properti ini:
    public $timestamps = false;  // Karena kolom 'created_at' dan 'updated_at' sudah otomatis ditangani
}
