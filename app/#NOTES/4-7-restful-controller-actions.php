<?php


//CREATE A CONTROLLER WITH ALL 7 ACTIONS
php artisan make:controller ProjectsController -r 

//if you want to specify an associated model:
php artisan make:controller ProjectsController -r -m Project //model is called project 

//if project model doesnt exist it will offer to create one
//it will pull in the model to your controller and reference it in your methods


//RESTFUL ROUTING
//for update and delete use restful verbs (GET, POST, PUT, DELETE, PATCH)..
//don't use verbs in your url (eg. users/:id/delete)

//GET - reading resources (index & show)

//PUT / PATCH - edit/update resource
//bring up an edit form
GET /articles/:id/edit
//put new data to db
PUT /articles/:id

//DELETE - delete resource
DELETE /articles/:id

//POST - create resource
//bring up a create form
GET /articles/create
//post data to db
POST /articles


//INDEX
//show all items/posts (resources)

//-route-
Route::get('/articles/{article}', 'App\Http\Controllers\ArticleController@index');

//-controller-

//index function can just fetch all model data
public function index() {
  $articles = Article::latest()->get();

  //then you return your view and pass down the data as you would in your routes file
  return view('articles.show', ['article' => $articles]);
}


//SHOW
//show a single item/post (resource) based on a unique key

//-route-
Route::get('/articles/{article}', 'App\Http\Controllers\ArticleController@show');

//-controller-

//show function should take the wildcard that the user enters
public function show($articleId) {
  //set a new article variable to equal the model and filter it as you need
  $article = Article::find($articleId);

  //then you return your view and pass down the data as you would in your routes file
  return view('articles.show', ['article' => $article]);
}


//CREATE
//shows a view that creates a new resource

//-see 4.1-forms

//STORE
//persist the new resource

//EDIT
//show a view to edit an existing resource

//UPDATE
//persist the edited resource

//DESTROY
//delete the resource