<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $products = DB::table('products')->get();
    return view('welcome', ['products' => $products]);
});
