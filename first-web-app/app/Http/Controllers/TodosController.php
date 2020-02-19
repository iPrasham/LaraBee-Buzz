<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodosController extends Controller
{
    //
    public function index(){
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    /*
    public function show($todoID){                   //   without route model binding
        $todo = Todo::find($todoID);                    
        return view('todos.show', compact('todo'));
    }
    */

    //with route model binding
    public function show(Todo $todo){               // the name of the parameter should be same  
        // return $todo;
        return view('todos.show', compact('todo'));
    }

}
