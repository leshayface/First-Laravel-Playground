<?php

namespace App\Http\Controllers;


//import Article model:
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //index function can just fetch all model data
    public function index() {

        if(request('tag')) {
          $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
          $articles = Article::latest()->get();
        }
      
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

        $tags = Tag::all();

        return view('articles.create', compact('tags'));
    }

    //submit new resource to db
    public function store() {
      //hard code user_id and attach tags when creating a new article
      $article = new Article($this->validateArticle());
      $article->user_id = 1; //we will use auth eventually: auth()->id()
      $article->save();

      $article->tags()->attach(request('tags'));
      //attaching the forms data (array of tag ids) to the articles->tags

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
        'img_path' => 'required',
        'tags' => 'exists:tags,id'
      ]);
    }
}
