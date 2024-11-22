<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;

class PencarianController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(Request $request)
    {
        // Validasi input
        $table = $request->input('table');
        $fields = $request->input('fields');
        $keyword = $request->input('search');

        if (!$table || !$fields || !$keyword) {
            return response()->json(['error' => 'Parameter pencarian tidak lengkap.'], 422);
        }

        try {
            // Memecah fields menjadi array
            $fieldsArray = explode(',', $fields);

            // Panggil search service
            $results = $this->searchService->searchInTable($table, $fieldsArray, $keyword);

            // Kembalikan response JSON dengan struktur yang rapi
            return response()->json($results, 200);
        } catch (\Exception $e) {
            // Menangkap error dan memberikan respons JSON
            return response()->json([
                'error' => 'Terjadi kesalahan saat melakukan pencarian.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
