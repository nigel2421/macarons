@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <div class="container mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold text-center mb-12 text-gray-800">Your Shopping Cart</h1>

        @if(session('cart') && count(session('cart')) > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-2">
                    @foreach(session('cart') as $id => $details)
                        <div class="flex items-center justify-between p-4 border-b">
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/' . $details['image_url']) }}" alt="{{ $details['name'] }}" class="w-24 h-24 object-cover rounded-lg">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">{{ $details['name'] }}</h2>
                                    <p class="text-gray-600">{{ $details['price_option'] }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-pink-500">Ksh {{ number_format($details['price'], 2) }}</p>
                                <p class="text-sm text-gray-500">Quantity: {{ $details['quantity'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Order Summary</h2>
                    @php $total = 0 @endphp
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="text-lg font-bold text-gray-800">Ksh {{ number_format($total, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-gray-600">Shipping</span>
                        <span class="text-lg font-bold text-gray-800">Free</span>
                    </div>
                    <div class="flex justify-between items-center border-t pt-4">
                        <span class="text-xl font-bold text-gray-800">Total</span>
                        <span class="text-2xl font-bold text-pink-500">Ksh {{ number_format($total, 2) }}</span>
                    </div>
                    <a href="#" class="mt-8 w-full text-center bg-pink-500 text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-pink-600 transition-colors">Proceed to Checkout</a>
                </div>
            </div>
        @else
            <div class="text-center text-gray-500">
                <p class="text-2xl mb-4">Your cart is empty!</p>
                <a href="{{ route('home') }}" class="bg-pink-500 text-white px-8 py-3 rounded-full font-bold hover:bg-pink-600 transition-colors">Continue Shopping</a>
            </div>
        @endif
    </div>
@endsection
