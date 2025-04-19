<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-zinc-900 text-white">

<div class="max-w-lg mx-auto mt-10 p-6 bg-zinc-800 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Checkout</h1>

    <!-- User Info -->
    <div class="mb-4">
        <input type="text" id="firstName" placeholder="First Name" class="w-full px-4 py-2 mb-2 rounded bg-zinc-700 text-white placeholder-gray-400">
        <input type="text" id="lastName" placeholder="Last Name" class="w-full px-4 py-2 mb-2 rounded bg-zinc-700 text-white placeholder-gray-400">
        <input type="text" id="Location" placeholder="Location" class="w-full px-4 py-2 rounded bg-zinc-700 text-white placeholder-gray-400">
    </div>

    <!-- Card Info -->
    <div class="mb-4">
        <input type="text" id="cardNumber" placeholder="Card Number" class="w-full px-4 py-2 mb-2 rounded bg-zinc-700 text-white placeholder-gray-400">
        <div class="flex space-x-4">
            <input type="text" id="expiryDate" placeholder="MM/YY" class="w-1/2 px-4 py-2 rounded bg-zinc-700 text-white placeholder-gray-400">
            <input type="text" id="cvv" placeholder="CVV" class="w-1/2 px-4 py-2 rounded bg-zinc-700 text-white placeholder-gray-400">
        </div>
    </div>

    <!-- Cart Items -->
    <div id="cartItems" class="mb-4">
        <!-- Cart items will be displayed here -->
    </div>

    <hr class="my-4 border-gray-600">

    <div class="flex justify-between">
        <p class="text-lg font-semibold">Total: </p>
        <p id="totalPrice" class="text-xl font-bold">$0.00</p>
    </div>

    <button id="completePurchase" class="mt-6 bg-red-600 px-6 py-2 rounded-lg w-full hover:bg-red-500 transition duration-300">
        Complete Purchase
    </button>
</div>

<!-- Popup Modal -->
<div id="popupModal" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-zinc-800 p-8 rounded-lg shadow-lg text-center z-60">
        <h2 class="text-2xl font-bold text-green-500 mb-4">Purchase Completed!</h2>
        <p class="text-gray-300 mb-6">Thank you for your purchase. Your order has been successfully processed.</p>
        <button id="closePopup" class="bg-red-600 px-6 py-2 rounded-lg hover:bg-red-500 transition duration-300">
            Close
        </button>
    </div>
</div>

<script src="{{ asset('js/checkout.js') }}"></script>
</body>
</html>
