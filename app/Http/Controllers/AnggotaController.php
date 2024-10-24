<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    //
    public function index()
    {
        $anggota = Anggota::all(); // ::all artinya ambil semua record 
        return view('anggota.index', ['anggota'=>$anggota]);
    }
}
