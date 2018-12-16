<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['title'];
    
    public function scopetrending($query, $limit=3) {
        return $query->orderBy('reads', 'desc')->orderBy('id','desc')->limit($limit)->get();
    }
}
