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
    public function show(Article $article) {

        //then you return your view and pass down the data as you would in your routes file
        return view('articles.show', ['article' => $article]);
    }

    //return create form
    public function create() {
        return view('articles.create');
    }

    //submit new resource to db
    public function store() {
      Article::create($this -> validateArticle());
    }

    //return edit view (form)
    public function edit(Article $article) {
        // return view('articles.edit', ['article' -> $article]);
        //can also use php compact funcrion for same thing:
        return view('articles.edit', compact('article'));

    }

    public function update(Article $article) {

        $article->update($this -> validateArticle());

        return redirect('/articles/' . $article->id);
    }

    protected function validateArticle() {
      return request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required',
      ]);
    }
}
