<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//App::bind('App\Billing\Stripe', function (){
//    return new \App\Billing\Stripe(config('services.stripe.secret'));
//});
//
//$stripe = App::make('App\Billing\Stripe');
//
////$stripe = app('App\Billing\Stripe');
////
////$stripe = resolve('App\Billing\Stripe');
//
//dd($stripe);






use Illuminate\Support\Facades\DB;

// use App\Task;       //importing Eloquent Model Task

// use App\Todo;



// Routing without controller which makes the code tedious and complicated


// Route::get('/', function () {
//    /*
//         return view('welcome',[         { pass associative array as second argument to pass data to view}
//             'name' => 'World'
//         ]);
//     */

//     // return view('welcome') -> with('name', 'Prasham');             { or use with function }
    
//     //$name = 'Prasham';

//     //return view('welcome', ['name' => $name]);
    
//     //return view('welcome', compact('name'));              { or also php can do it for you use compact function }

//    /*
//     $tasks = [
//         'Learn Laravel',
//         'Revise SQL'
//     ];
//   */
//     // return view('welcome', compact('tasks'));

//     $tasks = DB::table('tasks')->latest()->get();
    
//     //return $tasks     { returns json formatted data of the rows};

//     return view('welcome', compact('tasks'));   // produce error at view end as view expects parameter to be string object passed 
// });

// Route::any('/tasks', function () {
//     //dd($taskID);
//     // var_dump($taskID);
//     // $task = DB::table('tasks')->find($taskID);
//     // dd($task);
//     $tasks = DB::table('tasks')->latest()->get();
//     return view('tasks.index', compact('tasks'));
// });

// Route::any('/tasks/{taskID}', function ($taskID) {
//     //dd($taskID);
//     //var_dump($taskID);

//     //$task = DB::table('tasks')->find($taskID);
    
//     //dd($task);
    
//     //$task = App\Task::find($taskID);        //using Eloquent Model Task
    
//     $task = Task::find($taskID);           
//     return view('tasks.show', compact('task'));
// });


// Route::get('/todos', function(){
//     $todos = DB::table('todos')->latest()->get();
//     return view('todos.index', compact('todos'));
// });


// Route::get('/todos/{todoID}', function ($todoID) {
//     $todo = Todo::find($todoID);
//     return view('todos.show', compact('todo'));
// });

// Route::get('about', function () {
//     // return DB::table('tasks')->value('id');      { return the column value first row}
    
    
//     /*$ids = array();
//     while($id = DB::table('tasks')->value('id')){           wrong dont do this produces error
//         $ids[] = $id;
//     }
//     return $ids;*/
    
//     return view('about');
// });f




//Route::get('/', 'TasksController@index');    //redirecting a route to a same controller

Route::get('/tasks', 'TasksController@index');      //passing get request /tasks to index method in TasksController 

//Route::get('/tasks/{taskID}', 'TasksController@show');      //passing get request /tasks/taskID to show method in TasksController

Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/todos', 'TodosController@index');      //passing get request /todos to index method in TodosController

// Route::get('/todos/{todoID}', 'TodosController@show');        //passing get request /todos/todoID to show method in TodosController

Route::get('todos/{todo}', 'TodosController@show');   //passing todo as a wildcard so that laravel implicitly converts for us

// ==================================================== //
// larabee buzz web app routes

Route::get('/', 'PostController@index')->name('home');

Route::get('/posts/create', 'PostController@create');

Route::post('/posts', 'PostController@store');

Route::get('/posts/{post}', 'PostController@show');

Route::post('/posts/{post}/comments', 'CommentController@store');


//  ====== authorization routes ====== //

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// ====== login and register request ====== //

// Route::get('/register', 'RegistrationController@create');

// Route::post('register', 'RegistrationController@store');

// Route::get('/login', 'SessionController@create')->name('login');

// Route::post('/login', 'SessionController@store');

// Route::get('/login', 'LoginController@showLoginForm');

// Route::get('/logout', 'SessionController@destroy');

Route::get('/logout', 'Auth\LoginController@logout');


// =============== fallback route =================== //

// Route::fallback(function(){
//     return "The page you requested is not available";
// });


