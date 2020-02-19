<?php

namespace App\Repositories;

use App\Post;

class PostRepository{


    public  function  all(){
        //return all posts
//        return Post::select()->get();
        return Post::all();
    }

}
