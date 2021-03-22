<?php

//don't use find() use findOrFail() so passing non existant ids get caught

$article = Article::findOrFail($articleId);

// we too often pass through an id and fetch an article by that id 
//we can use Route Model Binding instead:

//INSTEAD OF:
public function show($articleId) {
  $article = Article::find($articleId);
}

//CAN DO:

public function show(Article $article) {
}


//CREATE
//INSTEAD OF
// public function store() {
//   $validAttributes = request()->validate([
//     'title' => 'required',
//     'excerpt' => 'required',
//     'body' => 'required',
//   ]);

//   Article::create($validAttributes);

  //INLINE IT:
  Article::create(request()->validate([
    'title' => 'required',
    'excerpt' => 'required',
    'body' => 'required',
  ]));

  return redirect('/articles');
}

//YOU WILL GET AN ERROR (Add [title] to fillable property to allow mass assignment on [App\Models\Article].)
//in Models/Article you need to tell laravel not to protect you from anything

class Article extends Model
{
  protected $gaurded = [];
}


//DO SAME FOR EDIT (refactor)

public function update(Article $article) {

  $article->update(request()->validate([
    'title' => 'required',
    'excerpt' => 'required',
    'body' => 'required',
  ]));

  return redirect('/articles/' . $article->id);
}

//SINCE IN THIS CASE THE CREATE AND UPDATE USE THE SAME ATTRIBUTES YOU CAN STORE AND REUSE LOGIC

