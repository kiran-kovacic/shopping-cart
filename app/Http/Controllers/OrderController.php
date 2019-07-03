<?php

namespace App\Http\Controllers;

use Auth;
use App\Articles;
use App\Categories;
use App\Orders;
use App\Cart;
use App\Articles_orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function makeOrder(Request $request, $price)
    {
        $shoppingcart = new cart($request);
        $cart = $request->session()->get('cart');
        $client =  Auth::id();
        $order = new orders;
        $order->total_price = $price;
        $order->user_id = $client;
        $order->save();
        foreach ($cart as $key => $item ) {
            $orderDetail = new Articles_orders;
            $orderDetail->order_id = $order->id;
            $orderDetail->article_id = $item['id'];
            $orderDetail->quantity = $item['qty'];
            $orderDetail->save();
        }
        $shoppingcart->forgetItem($request);
        return redirect('/');
    }

    public function info()
    {
        $client = Auth::id();
        $orders = orders::where('user_id', $client)->get();
        $categories = categories::all();
        return view('order', [
            'orders' => $orders,
            'categories' => $categories,
        ]);
    }
}
