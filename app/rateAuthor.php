<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rateAuthor extends Model
{
    protected $table = 'author_user';
    protected $fillable = ['rating', 'user_id', 'author_id'];
}
