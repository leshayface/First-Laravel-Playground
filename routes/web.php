<?php

use Illuminate\Support\Facades\Route;

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

//GET REQUEST to get views

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

//other ways to return  response

//return string
Route::get('/', function () {
    return 'Hello World';
});

//return json
Route::get('/', function () {
    return ['Joe' => 'Biden'];
});

//Return A New View (go create it)

Route::get('test', function () {
    return view('test');
});


//PASS REQUEST DATA TO VIEWS

Route::get('passRequestData', function(){
    $name = request('name');

    return view('passRequestData', [
        'name' => $name
    ]); //pass array of values to view
});


//ROUTE WILD CARDS - return a specific route based on unique key (wildcard) eg ID (eg. a blog post)

//so here we are getting any random value from the url as {post} (eg. http://freshproject.test/posts/123) - {post} = 123
// Route::get('posts/{post}', function($post) {
//     return view('post');
// });


//but what if we want to return/render different data(posts) depending on the unique key
//lets create a simple database lookup
// Route::get('posts/{post}', function($post) {

//     $posts = [
//         'my-first-post' => 'Blah blah  blah blah blha',
//         'my-second-post' => 'Hhhhhhh Life is such a Joke'
//     ];

//     // add an error for when user enters a key that doesnt exist
//     if (! array_key_exists($post, $posts)) { //the first argument is the key and the second is the array
//         abort(404, 'Sorry, that post was not found');
//     }

//     //pass a variable called post to the view which will equal the unique key that the user enters into the url and return the matching data
//     return view('post', [
//         'post' => $posts[$post]
//     ]);
// });


//ROUTING TO CONTROLLER

Route::get('/posts/{post}', 'App\Http\Controllers\PostController@show');

//{post} is the unique key that the user enters