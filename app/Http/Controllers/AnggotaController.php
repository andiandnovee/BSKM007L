<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataAnggota;

class AnggotaController extends Controller
{
    //
    public function index()
    {
        $anggota = dataAnggota::all(); // ::all artinya ambil semua record 
        return view('anggota.index', ['anggota'=>$anggota]);
    }
}
