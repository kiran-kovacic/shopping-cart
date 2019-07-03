<?php

namespace App;
use Sessions;

class Cart {
    private $items = [];

/**
 *  __construct puts session with cart in $item if its exists.
 */

    public function __construct($request)
    {
        if ($request->session()->has('cart')) {
            $this->items = $request->session()->get('cart');
        } else {
            $this->items = NULL;
        }
    }

/**
 *  addToItems adds products to the items array.
 */

    public function addToItems($request, $product, $qty)
    {
        if (empty($this->items[$product->id])) {
            $this->items[$product->id] = ['id' => $product->id, 'qty' => $qty];
        } else {
            $this->items[$product->id]['qty'] += $qty;
        }
        $this->saveCart($request);
    }

/**
 *  removeFromItems removes products from the items array.
 */

    public function removeFromItems($request, $product, $qty)
    {
        if ($this->items[$product->id]['qty'] <= 1) {
            unset($this->items[$product->id]);
        } else {
            $this->items[$product->id]['qty'] -= $qty;
            if ($this->items[$product->id]['qty'] <= 0) {
                unset($this->items[$product->id]);
            }
        }
        $this->saveCart($request);
    }

    /**
 * calculateTotalPrice calculates the total price.
 */

    public function calculateTotalPrice($articles)
    {
        $price = 0;
        foreach ($articles as $article) {
            $products[$article['id']] = ['qty' => $article['qty'], 'article' => articles::find($article['id'])];
            $price += $products[$article['id']]['qty'] * $products[$article['id']]['article']['price'];
        }
        $cartInfo = ['products' => $products, 'price' => $price];
        return $cartInfo;
    }

    public function forgetItem($request)
    {
        $request->session()->forget('cart');
    }

    public function removeAItem($request, $id)
    {
        unset($this->items[$id]);
        $this->saveCart($request);
    }

    private function saveCart($request)
    {
        $request->session()->put('cart', $this->items);
        $request->session()->save();
    }

    public function getItems()
    {
        return $this->items;
    }

}