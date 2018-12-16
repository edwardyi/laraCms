<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'img_upload'
    ];
    
    public function user()
    {
       return $this->belongsTo(\App\User::class);
    }
}
