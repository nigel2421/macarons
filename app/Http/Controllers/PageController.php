<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Event;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::latest()->get();
        $events = Event::latest()->take(3)->get();
        return view('welcome', compact('products', 'events'));
    }

    public function events()
    {
        $events = Event::latest()->get();
        return view('events', compact('events'));
    }

    public function cart()
    {
        return view('cart');
    }
}
