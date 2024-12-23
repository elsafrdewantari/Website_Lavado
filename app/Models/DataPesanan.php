<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPesanan extends Model
{
    use HasFactory;

    protected $table = 'data_pesanan';
    protected $fillable = [
        'id_pesanan', 'NoNota','id_pelanggan', 'berat', 'jenis_layanan', 'jenis_paket', 
        'tanggal_masuk', 'status_pesanan', 'estimasi_selesai','biaya'
    ];
    protected $primaryKey = 'id_pesanan'; // Kolom primary key yang benar

    // Tentukan apakah kolom primary key auto increment
    public $incrementing = false; // Jika ID pesanan berupa string, set false

    // Tentukan tipe data kolom primary key
    protected $keyType = 'string'; // Karena ID menggunakan string, bukan integer
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }
}

