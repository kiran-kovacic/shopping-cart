<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $articles = articles::all();
        return view('products', [
            'articles' => $articles,
        ]);
    }

    public function show($article)
    {
        $article = articles::find($article);
        return view('product', [
            'article' => $article,
        ]);
    }
}
