<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('layouts.sidebar', function($view){            //the view composer wherever loads the sidebar view it adds a  
            $view->with('archives', \App\Post::archives());              //archives variable as it is passed with the view in the callback 
        });                                                             //function            
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

//        \App::bind('\App\Billing\Stripe', function (){
//            return new \App\Billing\Stripe(config('services.stripe.secret'));
//        });


//        $this->app->bind('\App\Billing\Stripe', function (){
//            return new \App\Billing\Stripe(config('services.stripe.secret'));
//        });
//
//        //$stripe = App::make('App\Billing\Stripe');
//
//        //$stripe = app('App\Billing\Stripe');
//        //
//        $stripe = resolve('\App\Billing\Stripe');
//
//        dd($stripe);

    }
}
