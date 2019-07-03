<?php

namespace App\Http\Controllers;

use Sessions;
use App\Cart;
use App\Articles;
use App\Categories;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $products = [];

    public function index(Request $request)
    {
        $cart = new Cart($request);
        $items = $request->session()->get('cart');
        if ($items == NULL) {
            $cartInfo['products'] = NULL;
            $cartInfo['totalPrice'] = NULL;
        } else {
            $cartInfo = $cart->calculateTotalPrice($items);
        }
        $categories = categories::all();
        return view('cart', [
            'categories' => $categories,
            'cartInfo' => $cartInfo,
        ]);
    }

    public function addOrRemoveArticle(Request $request, $id)
    {
        $product = articles::findOrFail($id);
        $cart = new Cart($request);
        $qty = $request->input('qty', 1);
        if ($request['action'] == '+') {
            $cart->addToItems($request, $product, $qty);
        } else if ($request['action'] == '-') {
            $cart->removeFromItems($request, $product, $qty);
        } else {
            $cart->removeAItem($request, $id);
        }
        return redirect()->back();
    }
}
