@extends('layouts.app')

@section('title', 'Supplements')

@section('content')

<!-- Swiper Container -->
<div class="swiper-container w-full" style="height: calc(100vh - 120px);">
        <div class="swiper mySwiper w-full h-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex items-center justify-center">
                    <img src="/imgs/supp1.jpeg" alt="Supplement 1" class="w-full h-full object-cover object-center">
                </div>
                <div class="swiper-slide flex items-center justify-center">
                    <img src="/imgs/supp2.png" alt="Supplement 2" class="w-full h-full object-cover object-center">
                </div>
                <div class="swiper-slide flex items-center justify-center">
                    <img src="/imgs/supp3.png" alt="Supplement 3" class="w-full h-full object-cover object-center">
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    

    <!-- Filtering Section -->
    <div class="w-full px-6 py-4 bg-red-600 shadow-md flex flex-wrap items-center justify-center gap-4">
        <div class="flex items-center border border-red-300 bg-black rounded-lg px-4 py-2 w-64">
            <i class="fas fa-search text-red-400 mr-2"></i>
            <input id="searchInput" type="text" placeholder="Search Supplements..." class="bg-black text-white outline-none border-none w-full">
        </div>

        <div class="relative">
            <select id="categoryFilter" class="border border-red-300 bg-black text-white rounded-lg px-4 py-2 outline-none">
                <option value="">All Categories</option>
                <option value="protein">Proteins</option>
                <option value="vitamins">Vitamins</option>
                <option value="preworkout">Energy Drinks</option>
            </select>
        </div>
        <div class="relative">
        <button id="cartButton" class="relative bg-black text-white px-4 py-2 rounded-lg flex items-center gap-2">
            <i class="fas fa-shopping-cart text-white text-xl"></i>
            <span id="cartCount" class="text-white bg-red-600 px-2 py-1 rounded-full text-xs">0</span>
        </button>
    </div>
        <button id="applyFilter" class="bg-red-800 text-white px-4 py-2 rounded-lg hover:bg-red-700">
            <i class="fas fa-filter mr-2"></i> Apply Filter
        </button>
    </div>
<!-- Cart Popup -->
<div id="cartPopup" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[999]">
    <div class="bg-gray-900 p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Shopping Cart</h2>
        <ul id="cartItems" class="space-y-2"></ul>
        <hr class="border-gray-700 my-2">
        <p class="text-lg font-bold text-white">Total: <span id="cartTotal">$0.00</span></p>
        <button id="checkoutButton" class="mt-4 bg-green-600 px-4 py-2 rounded-lg w-full hover:bg-green-500">Checkout</button>
        <button id="closeCart" class="mt-2 bg-red-600 px-4 py-2 rounded-lg w-full">Close</button>
    </div>
</div>

    <!-- Cards Section -->
    <div id="cards" class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
        <!-- Dynamic cards will be appended here -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script  src="{{ asset('js/supplement.js') }}"></script>
@endsection