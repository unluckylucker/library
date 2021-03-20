<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rateBook extends Model
{
    protected $table = 'book_user';
    protected $fillable = ['rating', 'user_id', 'book_id'];
}
