<?php

namespace App\Http\Controllers;


//import Article model:
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //index function can just fetch all model data
    public function index() {
        $articles = Article::latest()->get();
      
        //then you return your view and pass down the data as you would in your routes file
        return view('articles.index', ['articles' => $articles]);
    }

    //show function should take the wildcard that the user enters
    public function show($articleId) {
        //set a new article variable to equal the model and filter it as you need
        $article = Article::find($articleId);

        //then you return your view and pass down the data as you would in your routes file
        return view('articles.show', ['article' => $article]);
    }

    //return create form
    public function create() {
        return view('articles.create');
    }

    //submit new resource to db
    public function store() {
        request()->validate([
          'title' => 'required',
          'excerpt' => 'required',
          'body' => 'required',
        ]);
        // die('hello');
        // dump(request()->all()); //logs out request you getting from form

        //persist the new article
        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }

    //return edit view (form)
    public function edit($id) {

        //find article associated with the id
        $article = Article::find($id);

        // return view('articles.edit', ['article' -> $article]);
        //can also use php compact funcrion for same thing:
        return view('articles.edit', compact('article'));

    }

    public function update($id) {
        request()->validate([
          'title' => 'required',
          'excerpt' => 'required',
          'body' => 'required',
        ]);

        $article = Article::find($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/' . $article->id);
    }
}
