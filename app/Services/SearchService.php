<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SearchService
{
    public function searchInTable($table, $fields, $keyword)
    {
        // Memisahkan kata kunci menjadi array kata
        $keywords = explode(' ', $keyword);

        // Membuat query awal
        $query = DB::table($table);

        // Menambahkan pencarian untuk setiap kata kunci
        foreach ($keywords as $word) {
            $query->where(function ($q) use ($fields, $word) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'LIKE', "%{$word}%");
                }
            });
        }

        // Mengembalikan hasil dengan pagination
        return $query->paginate(10); // Pagination di luar loop
    }
}
