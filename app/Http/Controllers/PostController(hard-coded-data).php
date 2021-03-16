<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($post) {
        $posts = [
            'my-first-post' => 'Blah blah  blah blah blha',
            'my-second-post' => 'Hhhhhhh Life is such a Joke'
        ];

        // add an error for when user enters a key that doesnt exist
        if (! array_key_exists($post, $posts)) { //the first argument is the key and the second is the array
            abort(404, 'Sorry, that post was not found');
        }

        //pass a variable called post to the view which will equal the unique key that the user enters into the url and return the matching data
        return view('post', [
            'post' => $posts[$post]
        ]);
    }
}
