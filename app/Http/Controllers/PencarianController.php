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
    $table = $request->input('table');
    $fields = explode(',', $request->input('fields'));
    $keyword = $request->input('search');

    if (!$table || !$fields || !$keyword) {
        return response()->json(['error' => 'Parameter pencarian tidak lengkap.'], 422);
    }

    $results = $this->searchService->searchInTable($table, $fields, $keyword);
    
    


    return response()->json(['results' => $results]);
}

}
