<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Los Tres Macarons</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-pink-50 antialiased">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center text-pink-800 mb-8">Los Tres Macarons</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden product-card">
                    <img src="{{ json_decode($product->image_urls)[0] }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-pink-800 mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                        <div class="flex justify-between items-center">
                            <select class="price-select product-option-select bg-white border border-pink-300 text-pink-800 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5">
                                @foreach (json_decode($product->prices) as $price)
                                    <option value="{{ $price->price }}">{{ $price->option }} - {{ $price->price }}/=</option>
                                @endforeach
                            </select>
                            <button class="add-to-cart-btn bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded ml-4">
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Cart Icon -->
    <div id="cart-icon" class="fixed bottom-8 right-8 bg-pink-500 text-white p-4 rounded-full shadow-lg cursor-pointer hover:bg-pink-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span id="cart-badge" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full px-2 py-1">0</span>
    </div>

    <!-- Fly-out Cart -->
    <div id="cart-modal" class="fixed top-0 right-0 h-full w-full md:w-1/3 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out">
        <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-2xl font-bold text-pink-800">Your Cart</h2>
            <button id="close-cart-btn" class="text-gray-500 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div id="cart-items" class="p-4 overflow-y-auto"></div>
        <div class="p-4 border-t">
            <div class="flex justify-between items-center mb-4">
                <span class="text-xl font-bold text-gray-800">Total</span>
                <span id="cart-total" class="text-2xl font-bold text-pink-500">0/=</span>
            </div>
            <button id="whatsapp-order-btn" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full text-lg">
                Complete Order via WhatsApp
            </button>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed top-8 right-8 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out">
        Item added to cart!
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartIcon = document.getElementById('cart-icon');
            const cartBadge = document.getElementById('cart-badge');
            const cartModal = document.getElementById('cart-modal');
            const closeCartBtn = document.getElementById('close-cart-btn');
            const cartItemsContainer = document.getElementById('cart-items');
            const cartTotalEl = document.getElementById('cart-total');
            const whatsappOrderBtn = document.getElementById('whatsapp-order-btn');
            const toast = document.getElementById('toast');

            const saveCart = () => {
                localStorage.setItem('cart', JSON.stringify(cart));
            }

            const updateCartView = () => {
                cartBadge.textContent = cart.length;
                cartItemsContainer.innerHTML = '';
                let total = 0;

                if (cart.length === 0) {
                    cartItemsContainer.innerHTML = '<p class="text-gray-500">Your cart is empty.</p>';
                } else {
                    cart.forEach(item => {
                        const itemEl = document.createElement('div');
                        itemEl.className = 'flex justify-between items-center mb-2';
                        itemEl.innerHTML = `
                            <span>${item.name} (${item.option})</span>
                            <span>${item.price}/=</span>
                        `;
                        cartItemsContainer.appendChild(itemEl);
                        total += parseInt(item.price);
                    });
                }
                cartTotalEl.textContent = `${total}/=`;
            };

            const showToast = () => {
                toast.classList.remove('translate-x-full');
                setTimeout(() => {
                    toast.classList.add('translate-x-full');
                }, 2000);
            }

            document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                button.addEventListener('click', () => {
                    const productCard = button.closest('.product-card');
                    const name = productCard.querySelector('h2').textContent;
                    const priceSelect = productCard.querySelector('.price-select');
                    const price = priceSelect.value;
                    const option = priceSelect.options[priceSelect.selectedIndex].text.split(' - ')[0];

                    cart.push({ name, option, price });
                    saveCart();
                    updateCartView();
                    showToast();
                });
            });

            cartIcon.addEventListener('click', () => {
                cartModal.classList.remove('translate-x-full');
            });

            closeCartBtn.addEventListener('click', () => {
                cartModal.classList.add('translate-x-full');
            });

            whatsappOrderBtn.addEventListener('click', () => {
                if (cart.length === 0) {
                    alert('Your cart is empty!');
                    return;
                }

                let message = 'Hello, I would like to order the following macarons from Los Tres Macarons:\n\n';
                let totalPrice = 0;

                cart.forEach(item => {
                    message += `${item.name} (${item.option}) - ${item.price}/=\n`;
                    totalPrice += parseInt(item.price);
                });

                message += `\nTotal: ${totalPrice}/=`;

                const whatsappUrl = `https://wa.me/254723734211?text=${encodeURIComponent(message)}`;
                window.open(whatsappUrl, '_blank');
            });

            updateCartView();
        });
    </script>
</body>
</html>
