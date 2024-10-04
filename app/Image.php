<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Indicamos que tabla modificará en la base de datos
    protected $table = 'images'; //Indicamos la tabla images

    //RElación One To Many (Uno a muchos) --
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('id', 'desc'); // en parentesis esta con que objeto queremos que se relacione
    }

    //Relación One to Many con los likes
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    //esto nos permite sacar todos los comentarios de una imagen y todos los likes de una imagen respectivamente

    // Relación de Many to One / Muchos a Uno
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id'); // con este metodo indicamos el objeto ORM con el que se relaciona y el campo de la tabla images con el que se relaciona

    }
}
