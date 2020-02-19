<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Model;
use Carbon\Carbon;

class Post extends Model
{
    //
    // protected $fillable = ['title', 'body']     //this will allow only title and body to be submitted to server

    // protected $guarded = [];         //this array will include the fields that you dont want to submit to server

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function addComment($body){
        // Comment::create([            //we can also do it with the eloquent model
        //     'body' => $body,          
        //     'post_id' => $this->id
        // ]);
        
        $this->comments()->create(compact('body'));     //eloquent model matches the id for you and add the comment for the
    }                                                   //specified post because of the relation we specified b/w post and comments

    public function scopeFilter($query, $filters){
        if($month = $filters['month']){
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year']){
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        # code...
        return static::selectRaw('year(created_at) as year, monthname(created_at) month, count(*) published')
                          ->groupBy('year', 'month')
                          ->orderByRaw('min(created_at) desc')
                          ->get()
                          ->toArray();
    }

}

