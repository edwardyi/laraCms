<?php

namespace App\Edward\Posts;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','title','body'];
}
