<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 use App\Post;

 use App\Repositories\PostRepository;

 use Carbon\Carbon;

class PostController extends Controller
{
    //

    public function __construct(){
        // $this->middleware('auth')->except(['index', 'show']);            //enable this for blogging websites
        $this->middleware('auth');                  //this will allow only authenticated users to request different data
    }

    public function index(){
        // $posts =  Post::latest()->get();         used for getting the latest post first

        // $posts = Post::latest();

        // if($month = request('month')){
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month);
        // }

        // if($year = request('year')){
        //     $posts->whereYear('created_at', $year);
        // }

        // $posts = $posts->get();                  //looks messy so below by query builder

        $posts = Post::latest()
                        ->filter(request(['month', 'year']))
                        ->get();


        // $archives = Post::selectRaw('year(created_at) as year, monthname(created_at) month, count(*) published')
        //                         ->groupBy('year', 'month')
        //                         ->orderByRaw('min(created_at) desc')
        //                         ->get()
        //                         ->toArray();         //temporary for learn
                                                        // will place in post model which looks much clean
                                                        // and follows the mvc architecture
        // return $archives;
        // return view('posts.index', compact('posts', 'archives'));       other pages which do not receive $archives fail
        return view('posts.index', compact('posts'));

    }


//    public function index(PostRepository $posts)         //getting posts by repository
//    {
//        //dd($posts);
//        $posts = $posts->all();
//        return view('posts.index', compact('posts'));
//    }

    public function create(){
        return view('posts.create');
    }

    public function show(Post $post){
        return view('posts.show',compact('post'));
    }

    public function store(){
        
        // dd(request()->all());       //give array of the data submitted
        // dd(request('title'));         //will give only the title
        // dd(request(['title', 'body']));     //will give array of requested fields

        /*
        //create a new post using the request data
        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');

        //save it to the database
        $post->save();
        */

        //you can also create the post and store in the database with one query
        
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body')
        // ]);                              //by creating object and passing the object

        $this->validate(request(), [            //laravel inbuilt validate function you can pass your desired validations
            'title' => 'required',              //if the fields dont satisfy the specified validations the form will not be sumbitted
            'body' => 'required'                //and the we will get the same form page where we can output the errors as it will return   
        ]);                                     //a errors array
        
        // Post::create(request(
        //     ['title', 'body']               //directly passing the object
        // ));

        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),  	    
        //     'user_id' => auth()->id()             //associating a post with user
        // ]);


        //more clean code by calling user publish function
        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        //and then redirect to the home page
        return redirect('/');
    }
}
