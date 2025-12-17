<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'price_option' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        $cart[$product->id] = [
            "name" => $product->name,
            "quantity" => 1, 
            "price_option" => $request->price_option,
            "price" => $this->getPriceFromOption($product, $request->price_option),
            "image_url" => $product->image_urls[0]
        ];

        session()->put('cart', $cart);

        return redirect()->route('home')->with('success', 'Product added to cart successfully!');
    }

    private function getPriceFromOption($product, $option)
    {
        $prices = json_decode($product->prices, true);
        foreach ($prices as $price) {
            if ($price['option'] === $option) {
                return $price['price'];
            }
        }
        return 0;
    }
}
