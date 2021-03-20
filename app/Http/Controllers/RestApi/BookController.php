<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\book;
use App\rateBook;

class BookController extends Controller
{
    public function getList(Request $request){
        if(!isset($request->sort) || !isset($request->sortDirection)){
            $sort = null;
        }else{
            $sort = [$request->sort, $request->sortDirection];
        }

        $bookInstance = new book();
        $books = $bookInstance->getBook($sort);

        return $books;
    }
}
