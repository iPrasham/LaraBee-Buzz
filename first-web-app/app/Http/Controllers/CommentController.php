<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Comment;

class CommentController extends Controller
{
    //
    public function store(Post $post){
            // Comment::create([                        //this can be done but a comment is related to a post show it would be 
            //     'body' => request('body'),           //more good if we add comment through the post model.
            //     'post_id' => $post->id
            // ]);

            $this->validate(request(), ['body' => 'required | min:2']);
            $post->addComment(request('body'));
        return back();

    }
}
