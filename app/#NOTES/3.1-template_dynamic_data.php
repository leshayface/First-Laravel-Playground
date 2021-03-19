<?php

//make an Article model with a migration:
php artisan make:model Article -m

//add required schema columns to migration file

Schema::create('articles', function (Blueprint $table) {
  $table->id();
  $table->string('title');
  $table->text('excerpt');
  $table->string('body');
  $table->timestamps();
});

php artisan migrate

//use elequent / tinker to create some articles
php artisan tinker

$article = new App\Models\Article 

$article->title = 'Getting to know us';

//copy some Lorum Ipsum text for excerpt and body

$article->excerpt = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'

$article->body = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.'


$article->save();



//CREATE 2 more articles


$article->title = 'Article Two Wow';

$article->excerpt = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.'

$article->body = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque vitae tempus quam pellentesque. Viverra suspendisse potenti nullam ac tortor. Vitae congue eu consequat ac felis donec et.'


$article->title = 'Article Three OMW';

$article->excerpt = 'Interdum posuere lorem ipsum dolor. In fermentum et sollicitudin ac orci phasellus egestas tellus rutrum.'

$article->body = 'Interdum posuere lorem ipsum dolor. In fermentum et sollicitudin ac orci phasellus egestas tellus rutrum. Sed euismod nisi porta lorem mollis. '


//RENDER THEM ON ABOUT PAGE

//Create an about us route and file connected to layout file

@extends ('layout')


@section ('content')

@endsection


//Add a menu bar to the layouts file

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    <div class="hidden fixed top-0 px-6 py-4 sm:block">
        <a href="/welcome" class="text-lg text-blue-100 underline">Home</a>
        <a href="/about" class="text-lg text-blue-100 underline">About</a>
        <a class="ml-4 text-lg text-blue-100 underline">Register</a>
    </div>
  </div>

//fetch all articles in routes file


Route::get('/about', function () {
  // $article = App\Models\Article::all(); just fetching them

  //what if we have millions and only wanna fetch a few:
  // $article = App\Models\Article::take(2)->get();

  //buit in paginator as well:
  // $article = App\Models\Article::paginate(2);

  //we just wanna fetch all as we have only 3 then we want to order them that latest are first (works on timestamp you can pass it in)
  $article = App\Models\Article::latest()->get();

  return view('about', ['articles' => $article]);

  //can make the above all one line:
  // return view('about', ['articles' => App\Models\Article::latest()->get()]);

});


//use a for each in about page to map over articles

@extends ('layout')


@section ('content')

  <div>
    <h1>ALL ARTICLES:</h1>
    @foreach ($articles as $article)
      <div style="width:40%">
        <h2>{{$article->title}}</h2>
        <h4>{{$article->excerpt}}</h4>
        <!-- <p>{{$article->body}}</p> -->
      </div>
    @endforeach
  </div>

@endsection

//in about page you may not want all posts loaded maybe just the 3 latest ones. So change route query:
$article = App\Models\Article::take(3)->latest()->get();


//lets make each excerpt link to a dedicated articles page

//add a route for articles that uses a controller
Route::get('/articles/{article}', 'App\Http\Controllers\ArticleController@show');


//Make controller:
php artisan make:controller ArticleController


//controller:

namespace App\Http\Controllers;


//import Article model:
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //show function should take the wildcard that the user enters
    public function show($articleId) {
        //set a new article variable to equal the model and filter it as you need
        $article = Article::find($articleId);

        //then you return your view and pass down the data as you would in your routes file
        return view('articles.show', ['article' => $article]);
    }
}

//create an article show page - articles/show.php:
<div>
  <h1>{{$article->title}}</h1>
</div>


//LINK each exceprt on the about page to the show page of specific id

<h1>ALL ARTICLES:</h1>
@foreach ($articles as $article)
  <div style="width:40%">
    <a href="articles/{{$article->id}}"><h2>{{$article->title}}</h2></a>
    <h4>{{$article->excerpt}}</h4>
    <!-- <p>{{$article->body}}</p> -->
  </div>
@endforeach
</div>



Route::get('articles', function() {
  $article = App\Models\Article::paginate(5);
  
  return view('articles', ['articles' => $article]);
});

//OR ADD IT TO YOUR ARTICLE CONTROLLER AS AN INDEX METHOD!!



