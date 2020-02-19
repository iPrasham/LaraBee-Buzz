<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    //
    public function create(){
        return view('registrations.create');
    }

    public function store()
    {
        # code...
        //validate the form
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required | confirmed' 
        ]);

        //create and save the user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        
        //sign them in
        //auth()->login($user); 

        //redirect to home page
        //return redirect()->home();                  

        return redirect('/');

    }

    public function showRegistrationForm()
    {
        return view('registrations.create');
    }
}
