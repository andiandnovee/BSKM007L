<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataAnggota extends Model
{
    use HasFactory;
    protected $table = 'tbl_m_anggota';
    protected $fillable = [
        'Anggota_nama',
        'Anggota_pengguna_id',
        'Anggota_Perumahan_id',
        'Anggota_Perumahan_no',
        'Anggota_Alamat',
        'Anggota_HP'
    ];
}
