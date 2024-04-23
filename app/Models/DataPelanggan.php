<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPelanggan extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'alamat', 'no_hp'];

    public function Pengiriman()
    {
        return $this->hasMany(DataPengiriman::class, 'id', 'id_pelanggan');
    }

}
