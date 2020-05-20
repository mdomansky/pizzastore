<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function index() {
        $cart = json_decode(Cookie::get('cart'), true);
        if (!$cart) {
            return redirect('/');
        }

        $total_cost = 0;
        $total_count = 0;
        foreach ($cart as $key => $item) {
            $pizza = Pizza::find($item['id']);
            $order['pizzas'][] = [
                'pizza' => $pizza,
                'qty' => $item['qty'],
            ];

            $total_cost += $pizza->price * $item['qty'];
            $total_count += $item['qty'];
        }
        $order['total_cost'] = $total_cost;
        $order['total_count'] = $total_count;

        return view('cart', [
            'order' => $order,
        ]);
    }

    public function create(Request $request) {
        dd($request->input());
    }
}
