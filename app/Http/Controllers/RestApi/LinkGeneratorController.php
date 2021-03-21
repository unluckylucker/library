<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Links;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;


class LinkGeneratorController extends Controller
{
    public function generateLink(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'url' => 'required|url'
            ],
            [
                'required' => 'Поле :attribute обязательно для ввода',
                'url' => 'Поле :attribute должно быть корректным урлом',
            ]
        );
        if ($validator->fails()) {
            return $validator->getMessageBag();
        }else{
            $link = $request->url;
            $token = Str::random(80);
            Links::create([
                'token'   => $token,
                'link' => $link
            ]);

            $result['url'] = route('one-time-link', $token);
            return $result;
        }

    }

    public function index($token){
        $item = Links::where('token', $token)->first();
        if(empty($item) || empty($item->link))return abort(404, 'Ссылки не существует или уже была использована');
        $link = $item->link;
        $item->delete();

        return redirect($link);
        //return $link;
    }
}
