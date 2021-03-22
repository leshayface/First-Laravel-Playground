<?php

//EDIT FORM

//-route-
//returns a edit form view
Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticleController@edit');


//-controller-
public function edit() {
  return view('articles.edit');
}


//form

@extends ('layout')


@section ('content')

<h1>EDIT ARTICLE</h1>


<!-- make fields equal default value in database using value -->
<form method="POST" action="/articles/{{$article->id}}">
  @csrf
  @method('PUT')

  <label for="title">Title</label>
  <input type="text" name="title" id="title" value="{{$article->title}}">


  <label for="excerpt">Excerpt</label>
  <textarea name="excerpt" id="excerpt">{{$article->excerpt}}</textarea>

  <label for="body">Body</label>
  <textarea name="body" id="body">{{$article->body}}</textarea>
 
  <button type="submit">Submit</button>
</form>

@endsection



//ACTUALLY UPDATE THE DATA IN DB USING PUT

//-route-
//persists edited data to db
Route::put('/articles/{article}', 'App\Http\Controllers\ArticleController@update');

