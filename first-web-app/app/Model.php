<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel{
    //
    protected $guarded = [];  //all the classes that inherits Model will contain this array   
                                //it is done for handling the Mass Assignmment Exception 
                                //Mass Assignment exception is caused because of security issues  
}
