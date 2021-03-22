<?php

//NAME YOUR ROUTES SO IF THEY CHANGE IT CHANGES EVERYWHERE IT IS USED

//example for the articles show route:
Route::get('/articles/{article}', 'App\Http\Controllers\ArticleController@show')->name('articles.show');

//replace where it is used:
//views/articles/index.blade.php

// @foreach ($articles as $article)
// <div style="width:40%">
  <a href="articles/{{$article->id}}"><h2>{{$article->title}}</h2></a>
//   <h4>{{$article->excerpt}}</h4>
//   <!-- <p>{{$article->body}}</p> -->
// </div>
// @endforeach

//BECOMES:

<a href="{{route('articles.show'), $article->id}}"><h2>{{$article->title}}</h2></a>