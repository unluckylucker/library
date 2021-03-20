<?php

namespace App\Http\Controllers\Auth;

use App\author;
use App\Http\Controllers\Controller;
use App\rateAuthor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingAuthor extends Controller
{
    public function index(Request $request){;
        if(empty($request->rate || empty($request->id))){
            $result['status'] = 'Ошибка. Пустые поля';
            return $result;
        }

        $author = author::find($request->id);
        if(!isset($author) || empty($author)){
            $result['status'] = 'Ошибка. Автора с id '.$request->id.' нет';
            return $result;
        }

        if(!in_array($request->rate, array(1,2,3,4,5))){
            $result['status'] = 'Ошибка. Оценка должна быть одним из следующих значений: 1,2,3,4,5';
            return $result;
        }

        $rateBook = new rateAuthor();
        $queryUserRateId = $rateBook->where([
            ['user_id',  Auth::user()->id],
            ['author_id',  $request->id]
        ])->first();

        $params['rating'] = $request->rate;
        if(!empty($queryUserRateId)){
            $id = $queryUserRateId->id;
            $queryUserRateId->update($params);
        }else{
            $params['user_id'] = Auth::user()->id;
            $params['author_id'] = $request->id;
            $newItem = $rateBook::create($params);
            $id = $newItem->id;
        }

        $newRating = $author->rating();
        $result['status'] = 'success';
        $result['id'] = $id;
        $result['newRating'] = $newRating;
        return $result;
    }
}
