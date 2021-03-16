<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Post; //you'll find the namespace in post model

class PostController extends Controller
{
    public function show($slug) { //the user entry is getting passed through here as the slug

        // $post = \DB::table('posts')->where('slug', $slug)->first();
        $post = Post::where('slug', $slug)->firstOrFail(); //store the matching data (entire object) in a post variable (data that matches users entry)

        //pass the post variable to the view which will equal the unique key that the user enters into the url and return the matching data
        return view('post', [
            'post' => $post //we are passing the post from the db that matches the unique key from the user
        ]);
    }
}
