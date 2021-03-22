<?php

//CREATE NEW ARTICLE

//FOR CREATE FORM VIEW:

//-route-
//returns a create new resource view
Route::get('/articles/create', 'App\Http\Controllers\ArticleController@create');


//-controller-
public function create() {
  return view('articles.create');
}

//articles/create
<h1>NEW ARTICLE</h1>

<form method="POST" action="/articles">
  @csrf
  <label for="title">Title</label>
  <input type="text" name="title" id="title"></input>


  <label for="excerpt">Excerpt</label>
  <textarea name="excerpt" id="excerpt"></textarea>

  <label for="body">Body</label>
  <textarea name="body" id="body"></textarea>
 
  <button type="submit">Submit</button>
</form>


//SUBMIT FORM

//-route-
//persists new create resource data to db
Route::post('/articles', 'App\Http\Controllers\ArticleController@store');

//-controller-

//submit new resource to db
public function store() {
    // die('hello');
    // dump(request()->all()); //logs out request you getting from form

    //persist the new article
    $article = new Article();

    $article->title = request('title');
    $article->excerpt = request('excerpt');
    $article->body = request('body');

    $article->save();

    return redirect('/welcome');
}


//we should care about what the user actually enters (could be malicious)
//-controller
public function store() {
  request()->validate([
    'title' => 'required',
    'excerpt' => 'required',
    'body' => 'required',
  ])
... 


//error message
//-view-

//error:
@error('title')
  <p>{{$errors->first('title')}}</p>
@enderror

//you can add a class when there is an error
<input class="input @error('title') is-danger @enderror" type="text" name="title" id="title"></input>

//if you don't want to lose the users previous value then us built in old function
<input value="{{old('title')}}" >