<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Order;
use App\Orderpizza;
use App\Cart;
use App\Deliveryoption;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
            'deliveryoptions' => Deliveryoption::all(),
        ]);
    }

    public function store(Request $request) {
        $cartpizzas = json_decode(Cookie::get('cart'), true);
        if (sizeof($cartpizzas)) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('cart')
                            ->withErrors($validator)
                            ->withInput();
            }

            $order = new Order();
            $order->user_id = Auth::id() ?: 0;
            $order->name = $request->input('name');
            $order->phone = $request->input('phone');
            $order->email = $request->input('email');
            if ($request->input('deliveryoption')) {
                $deliveryoption = Deliveryoption::find($request->input('deliveryoption'));
                $order->delivery_address = $request->input('delivery_address');
                $order->delivery_name = $deliveryoption->name;
                $order->delivery_cost = $deliveryoption->cost;
            }
            $order->status = Order::$status['new'];
            $order->save();

            foreach ($cartpizzas as $cp) {
                // we copy pizza information in order to store historic data of cart items
                $pizza = Pizza::find($cp['id']);                
                $orderpizza = new Orderpizza();
                $orderpizza->order_id = $order->id;
                $orderpizza->original_pizza_id = $cp['id'];
                $orderpizza->qty = $cp['qty'];
                $orderpizza->name = $pizza->name;
                $orderpizza->image = $pizza->image;
                $orderpizza->price = $pizza->price;
                $orderpizza->size = $pizza->size;
                $orderpizza->weight = $pizza->weight;
                $orderpizza->short_description = $pizza->short_description;
                $orderpizza->is_spicy = $pizza->is_spicy;
                $orderpizza->is_popular = $pizza->is_popular;
                $orderpizza->save();
            }

            $cookie = Cookie::forget('cart');
            return redirect(route('order_details', $order->id))->withCookie($cookie);
        }
    }

    public function order_details($id) {
        $order = Order::find($id);
        return view('order_details', [
            'order' => $order,
        ]);
    }
}
