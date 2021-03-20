<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
use App\author;
use App\Http\Classes\Search;

class MainController extends Controller
{
    public function index(){

        $bookInstance = new book();
        $books = $bookInstance->getBook();

        $authorInstance = new author();
        $authors = $authorInstance->getAuthor();



        return view('welcome', compact('books', 'authors'));
    }

    public function search(Request $request){
        $q = $request->q;
        $search = new Search();
        $result = $search->search($q);

        return view('search', compact('result'));
    }

    public function sort(Request $request){
        if(!isset($request->sort) || !isset($request->sortDirection)){
            $sort = null;
        }else{
            $sort = [$request->sort, $request->sortDirection];
        }
        $bookInstance = new book();
        $result = $bookInstance->getBook($sort);

        return view('search', compact('result'));
    }
}
