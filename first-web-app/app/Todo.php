<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    public static function incompleteTodos(){
        return static::where('isComplete', 0)->get();   //call this method in artisan tinker App\Todo::incompleteTodos()
    }

    public function scopeIncomplete($query){        //query scope { laravel will understand this func as query scope as it starts with scope}
        return $query->where('isComplete', 0);      //this function expects a query parameter
    }             
}                   //when called without explicitly giving query string it will return Eloquent class object
                    //call with query parameter eg: App\Todo->incomplete()->get(); //no need to write scope it will take impicitly


