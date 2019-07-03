<?php

namespace App\Http\Controllers;

use Sessions;
use App\Cart;
use App\Articles;
use App\Categories;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

  /*
  |--------------------------------------------------------------------------
  | public function welcome()
  |--------------------------------------------------------------------------
  |
  | gets all categories from the database and renders welcome.
  |
  */

    public function welcome()
    {
        $categories = categories::all();
        return view('welcome',[
            'categories' => $categories,
        ]);
    }

  /*
  |--------------------------------------------------------------------------
  | public function Index()
  |--------------------------------------------------------------------------
  |
  | takes all products out of the database and shows them in products.
  |
  */

    public function index()
    {
        $articles = articles::all();
        $categories = categories::all();
        return view('products', [
            'articles' => $articles,
            'categories' => $categories,
        ]);
    }

  /*
  |--------------------------------------------------------------------------
  | public function show($article)
  |--------------------------------------------------------------------------
  |
  | shows all all information of a single product.
  |
  */

    public function show($id)
    {
        $article = articles::find($id);
        $categories = categories::all();
        return view('product', [
            'article' => $article,
            'categories' => $categories,
        ]);
    }

  /*
  |--------------------------------------------------------------------------
  | public function category($category)
  |--------------------------------------------------------------------------
  |
  | shows all products from the given category.
  |
  */

    public function category($category)
    {
        $articles = articles::where('category_id', $category)->get();
        $categories = categories::all();
        
        return view('products', [
            'articles' => $articles,
            'categories' => $categories,
        ]);
    }

/**
 *  addToCart calls addToItems and sends the id, qty and the product info.
 */

    public function addToCart(Request $request, $id)
    {
        $product = articles::findOrFail($id);
        $shoppingcart = new Cart($request);
        $qty = $request->input('qty', 1);
        $shoppingcart->addToItems($request, $product, $qty);
        return redirect()->back();
    }

    public function flushShoppingcart(Request $request)
    {
        $shoppingcart = new cart($request);
        $shoppingcart->forgetItem($request);
        return redirect()->back();
    }

}