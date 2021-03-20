<?php

namespace App\Http\Classes;

use App\book;

class Search
{
    public function search($q){
        $result = book::whereHas('author', function($query) use($q) {
            $query -> where('name', 'LIKE', '%'. $q .'%');
        });

        $result = book::where('name', 'LIKE', '%'. $q .'%')->union($result)-> get();

        return $result;
    }
}
