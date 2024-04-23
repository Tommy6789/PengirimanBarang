<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengiriman extends Model
{
    use HasFactory;

    protected $fillable = ['id_pegawai', 'id_pelanggan', 'tanggal_dikirim', 'photo_penyerahan', 'harga', 'status'];

    public function pegawai()
    {
        return $this->belongsTo(DataPegawai::class, 'id_pegawai', 'id'); // Adjust the foreign key if necessary
    }

    public function pelanggan()
    {
        return $this->belongsTo(DataPelanggan::class, 'id_pelanggan', 'id'); // Adjust the foreign key if necessary
    }
}

