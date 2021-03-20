<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    protected $fillable = ['name'];
    public function books(){
        return $this->hasMany(book::class);
    }

    public function getAuthor($sort = null){
        if(!empty($sort)){
            $sortStr = $sort[0];
            if(!empty($sort[1])) $sortDirection = $sort[1];
            else $sortDirection = 'asc';
        }else{
            $sortStr = 'id';
            $sortDirection = 'asc';
        }
        $authors = $this->join('author_user', 'authors.id', '=', 'author_user.author_id')->orderBy($sortStr, $sortDirection)
            ->groupBy('author_id')
            ->selectRaw('avg(rating) as rating, author_id as author_id, authors.name as name, authors.id as id')
            ->get();

        return $authors;
    }


    public function rating(){
        $rates = $this->hasMany(rateAuthor::class);
        $count = $rates->count();
        $rating = 0;
        if($count>0){
            $allRate = 0;
            foreach ($rates->get() as $rate){
                $allRate += $rate->rating;
            }
            $rating = $allRate/$count;
        }

        return $rating;
    }
}
