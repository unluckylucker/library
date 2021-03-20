<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\author;

class AuthorController extends Controller
{
    public function getList(Request $request){

        $authorInstance = new author();
        $authors = $authorInstance->getAuthor();

        return $authors;
    }
}
