<?php 
namespace App\Exports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnggotaExport implements FromCollection
{
    public function collection()
    {
        return Anggota::all();
    }
}


