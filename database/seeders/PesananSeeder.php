<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesanan;  // Pastikan Anda mengimpor model Pesanan

class PesananSeeder extends Seeder
{
    public function run()
    {
        Pesanan::create([
            'id_pesanan' => 'A001',
            'id_pelanggan' => 'P001',
            'NoNota' => 'N12345',
            'Nama_pelanggan' => 'John Doe',
            'jenis_layanan' => 'Cuci Kering',
            'jenis_paket' => 'Reguler',
            'berat' => 5,
            'tanggal_masuk' => '2024-12-15',
            'estimasi_selesai' => '2024-12-20',
            'biaya' => 50000,
            'status_pesanan' => 'baru',
        ]);
    }
}
