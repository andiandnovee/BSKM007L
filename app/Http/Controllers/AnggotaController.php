<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnggotaExport;

class AnggotaController extends Controller
{
    //
    public function index(Request $request)
    {
     //   DB::enableQueryLog();

    $search = $request->input('search');
    $query = Anggota::with('perumahan')->query()
        ->when($search, function ($query, $search) {
            return $query->where('Anggota_nama', 'like', "%{$search}%");
        })
        ->orderBy('Anggota_nama', 'asc');

    // Eksekusi query
    $anggota = $query->paginate(10)
    ;

    // Lihat query utama tanpa query tambahan paginate()
   // $queryLog = DB::getQueryLog();
   // Log::info('Query Log:', DB::getQueryLog());

    return response()->json($anggota);
    }

    //Create : Simpan data
    public function store(Request $request)
    {
        $validated=$request->validate([
            'Anggota_nama' => 'required|string|max:50',
            'Anggota_pengguna_id' => 'nullable|integer',
            'Anggota_perumahan_id' => 'required|integer',
            'Anggota_perumahan_no' => 'required|string|max:10',
            'Anggota_alamat' => 'nullable|string|max:255',
            'Anggota_hp' => 'nullable|string|max:50'
            
        ]);
        
        $anggota = Anggota::create($validated)
        ->paginate(10)
        ;

        return response()->json($anggota,201);

    }

    //Update data :
    public function update(Request $request, $id)
    {
        $anggota=Anggota::findOrFail($id);
        $validated=$request->validate([
            'Anggota_nama' => 'required|string|max:50',
            'Anggota_pengguna_id' => 'nullable|integer',
            'Anggota_perumahan_id' => 'required|integer',
            'Anggota_perumahan_no' => 'required|string|max:10',
            'Anggota_alamat' => 'nullable|string|max:255',
            'Anggota_hp' => 'nullable|string|max:50'
            
        ]);

        $anggota->update($validated);
        return response()->json($anggota);
    }

    // Hapus data
    public function destroy($id)
    {
        $anggota=Anggota::findOrFail($id);
        $anggota->delete();
        return response()->noContent();
    }

    public function exportXls()
    {
        return Excel::download(new AnggotaExport,'Anggota.xlsx');
    }


}
