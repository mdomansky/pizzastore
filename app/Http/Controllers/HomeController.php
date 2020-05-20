<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Pizza;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pizzas = Pizza::orderBy('price', 'desc')->get();
        return view('home', [
            'pizzas' => $pizzas,
        ]);
    }
}
