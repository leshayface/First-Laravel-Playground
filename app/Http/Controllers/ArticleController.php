<?php

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
