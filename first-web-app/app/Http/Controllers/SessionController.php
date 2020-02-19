<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use AuthenticatesUsers;

class SessionController extends Controller
{
    //

    public function __construct(){
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        # code...
        return view('sessions.create');
    }


    // public function username(){
    //     return 'id';
    // }

    public function store(){
        //attempt to authenticate the user
        //if not, redirect back

        // if(!auth()->attempt(request(
        //     ['email', 'password']
        // ))){
        //     return back()->withErrors([
        //         'message' => 'Please check your credentials and try again'
        //     ]);
        // };

        // if(!auth()->attempt([                       //if you make an object and pass the id then it will compare id
        //     'id' => request('id'),                  
        //     'password' => request('password')
        // ])){
        //     return back()->withErrors([
        //         'message' => 'Please check your credentials and try again'
        //     ]);
        // }

        if(!auth()->attempt(request(
            ['id', 'password']
            ))){
                return back()->withErrors([
                     'message' => 'Please check your credentials and try again'
                ]);
            };

        //if so, sign them in //redirect to the home page
        return redirect('/');

    }

    public function destroy()
    {
        # code...
        auth()->logout();
        return redirect()->home();
    }
}
