<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    //Relación de muchos a uno
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    //Relación de muchos a uno
    public function image(){
        return $this->belongsTo('App\Image', 'image_id');
    }


}

