<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Classes\Search;

class MainController extends Controller
{

    public function search(Request $request){
        $q = $request->q;
        $search = new Search();
        $result = $search->search($q);

        return $result;
    }
}
