<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SearchService
{
    public function searchInTable($table, $fields, $keyword)
    {
        // Memisahkan kata kunci menjadi array kata
        $keywords = explode(' ', $keyword);
        $query = DB::table($table);

        foreach ($keywords as $word) {
            $query->where(function($q) use ($fields, $word) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'LIKE', "%{$word}%");
                }
            });
        }

        
        return $query->get();
    }
}
