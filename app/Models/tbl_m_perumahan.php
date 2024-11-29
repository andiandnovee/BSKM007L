<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_m_perumahan extends Model
{
    use HasFactory;
    protected $table= 'tbl_m_perumahan';
    protected $fillable =[
        'Perumahan_nama',
        'Perumahan_lokasi'
    ];

    public function anggota() { return $this->hasMany(Anggota::class, 'Anggota_perumahan_id'); }

}
