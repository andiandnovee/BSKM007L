<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $Anggota_id
 * @property string|null $Anggota_nama
 * @property int|null $Anggota_pengguna_id
 * @property int|null $Anggota_Perumahan_id
 * @property string|null $Anggota_Perumahan_no
 * @property string|null $Anggota_alamat
 * @property string|null $Anggota_HP
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota query()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAnggotaAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAnggotaHP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAnggotaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAnggotaNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAnggotaPenggunaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAnggotaPerumahanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAnggotaPerumahanNo($value)
 * @mixin \Eloquent
 */
class Anggota extends Model
{
    protected $table='tbl_m_anggota';
    use HasFactory;
}
