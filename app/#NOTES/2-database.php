<?php

//Add to .env :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel6
DB_USERNAME=root
DB_PASSWORD=


//make sure takeout is running mysql (takeout list / takeout start)
//in your mysql gui connect to your localhost and database (laravel6) - using TablePlus
//go to structure tab and create new table called posts with (id, slug [varchar(255)], body(text))
//go to data tab and add a new post

//update controller to use database table:


class PostController extends Controller
{
    public function show($slug) {

        $post = \DB::table('posts')->where('slug', $slug)->first();

        dd($post); //logs out data

        //pass the post variable to the view which will equal the unique key that the user enters into the url and return the matching data
        return view('post', [
            'post' => $post
        ]);
    }
}

//you will still have an issue because in your view you are referencing the entire $post object as you can see when dd'ing it
//you must output the object body. So in post view use:
<h3>{{ $post->body }}</h3>

//what if key user enters does not match anything in db? You removed the code that prevented that.
//you can do:

if(! $post) {
  abort(404);
}


//!! run php artisan to get help on commands

//There is a better way to write your query builder using Eloquent:
//run: php artisan make:model Post

//A model is good for:
  //1) provides same api for performing sequel queries 
  //2) Also place to store any relavent business logic (eg. completed methods)

//update controller to use model:

namespace App\Http\Controllers;

use DB;
use App\Models\Post; //you'll find the namespace in post model

class PostController extends Controller
{
    public function show($slug) {

        // $post = \DB::table('posts')->where('slug', $slug)->first();
        $post = Post::where('slug', $slug)->first();



//better way to throw an error is:

$post = Post::where('slug', $slug)->firstOrFail();