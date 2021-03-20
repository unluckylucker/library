<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\book;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        //$books = book::get();
        //$user = Auth::user();
        //return view('home', compact('books', 'user'));
        return view('home');
    }

}
