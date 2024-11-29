<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Anggota extends Model
{
    use HasFactory;
    protected $table = 'tbl_m_anggota';
    protected $fillable = [
        'Anggota_nama',
        'Anggota_pengguna_id',
        'Anggota_perumahan_id',
        'Anggota_perumahan_no',
        'Anggota_alamat',
        'Anggota_hp'
    ];


    public function perumahan()
    {
        return $this->belongsTo(tbl_m_perumahan::class, 'Perumahan_id');
    }


}
