<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = ['name', 'file', 'author_id'];

    public function author(){
        return $this->belongsTo(author::class);
    }

    public function getBook($sort = null){
        if(!empty($sort)){
            $sortStr = $sort[0];
            if(!empty($sort[1])) $sortDirection = $sort[1];
            else $sortDirection = 'asc';
        }else{
            $sortStr = 'id';
            $sortDirection = 'asc';
        }


        $books = $this->join('book_user', 'books.id', '=', 'book_user.book_id')->orderBy($sortStr , $sortDirection)
            ->groupBy('book_id')
            ->selectRaw('avg(rating) as rating, book_id as book_id, books.name as name, books.file as file, books.id as id')
            ->get();

        return $books;
    }

    public function rating(){
        $rates = $this->hasMany(rateBook::class);
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

    public function ratingBookUser(){
        return $this->belongsToMany(User::class);
    }
}
