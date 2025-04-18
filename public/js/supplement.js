document.addEventListener("DOMContentLoaded", function () {
    const supplementsUrl = "{{ route('supplements.get') }}";

    function loadSupplements() {
        const cardsContainer = document.getElementById("cards");
        cardsContainer.innerHTML = "<p class='text-center text-gray-400'>Loading supplements...</p>";

        const search = document.getElementById("searchInput").value.trim();
        const category = document.getElementById("categoryFilter").value;

        const queryParams = new URLSearchParams();
        if (search) queryParams.append("search", search);
        if (category) queryParams.append("category", category);

        fetch(supplementsUrl + "?" + queryParams.toString())
            .then(response => response.json())
            .then(data => {
                cardsContainer.innerHTML = "";

                if (data.length === 0) {
                    cardsContainer.innerHTML = "<p class='text-center text-gray-400'>No supplements found.</p>";
                    return;
                }

                data.forEach(item => {
                    const card = document.createElement("div");
                    card.classList.add("bg-gray-800", "rounded-lg", "shadow-md", "overflow-hidden", "transition-transform", "hover:scale-105");

                    let imagePath = item.image.startsWith('http') ? item.image : "{{ asset('') }}" + item.image;

                    card.innerHTML = `
                        <img src="${imagePath}" alt="${item.name}" class="w-full h-48 object-cover object-center">
                        <div class="p-4">
                            <h3 class="text-xl font-bold mb-2">${item.name}</h3>
                            <p class="text-gray-400 text-sm mb-2">${item.description}</p>
                            <p class="text-red-400 font-semibold mb-2">Category: ${item.category}</p>
                            <p class="text-green-400 font-bold mb-2">$${(parseFloat(item.price) || 0).toFixed(2)}</p>
                            <p class="text-gray-400 text-sm mb-4">In Stock: ${item.stock}</p>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 w-full">
                                Add to Cart
                            </button>
                        </div>
                    `;

                    cardsContainer.appendChild(card);
                });
            })
            .catch(error => {
                console.error("Error fetching data:", error);
                cardsContainer.innerHTML = `<p class="text-center text-red-500">Failed to load supplements. Please try again later.</p>`;
            });
    }

    loadSupplements();
    document.getElementById("applyFilter").addEventListener("click", loadSupplements);
    document.getElementById("searchInput").addEventListener("input", loadSupplements);
});
document.addEventListener("DOMContentLoaded", function () {
var swiper = new Swiper(".mySwiper", {
loop: true, // Enables infinite scrolling
autoplay: {
    delay: 3000, // Auto-slide every 3 seconds
    disableOnInteraction: false, // Keeps autoplay active after user interaction
},
navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
},
pagination: {
    el: ".swiper-pagination",
    clickable: true,
},
slidesPerView: 1,
spaceBetween: 10,
effect: "fade", // Smooth fade transition between slides
});
});


document.addEventListener("DOMContentLoaded", function () {
let cart = JSON.parse(localStorage.getItem("cart")) || [];
const cartCount = document.getElementById("cartCount");
const cartTotal = document.getElementById("cartTotal");

function updateCartDisplay() {
cartCount.textContent = cart.length;
let totalPrice = cart.reduce((sum, item) => sum + item.price, 0);
cartTotal.textContent = `$${totalPrice.toFixed(2)}`;
document.getElementById("cartItems").innerHTML = cart.length > 0 ? 
    cart.map((item, index) => `
        <div class="p-4 border-b flex justify-between items-center">
            <div>
                <h3 class="text-lg font-bold">${item.name}</h3>
                <p class="text-sm text-gray-400">$${item.price.toFixed(2)}</p>
            </div>
            <button class="bg-red-600 text-white px-2 py-1 rounded remove-item" data-index="${index}">Delete</button>
        </div>
    `).join("") : '<p class="text-center text-gray-400">Cart is empty.</p>';

localStorage.setItem("cart", JSON.stringify(cart)); // Save cart to localStorage
addDeleteListeners();
}

function addDeleteListeners() {
document.querySelectorAll(".remove-item").forEach(button => {
    button.addEventListener("click", function () {
        const index = this.getAttribute("data-index");
        cart.splice(index, 1);
        updateCartDisplay();
    });
});
}

document.getElementById("cards").addEventListener("click", function (event) {
if (event.target.tagName === "BUTTON" && event.target.textContent.includes("Add to Cart")) {
    const card = event.target.closest(".bg-gray-800");
    const name = card.querySelector("h3").textContent;
    const price = parseFloat(card.querySelector(".text-green-400").textContent.replace("$", ""));

    cart.push({ name, price });
    updateCartDisplay();
}
});

document.getElementById("checkoutButton").addEventListener("click", function () {
if (cart.length === 0) {
    alert("Your cart is empty.");
    return;
}

window.location.href = "{{ route('checkout.show') }}";
});

document.getElementById("cartButton").addEventListener("click", function () {
document.getElementById("cartPopup").classList.remove("hidden");
});

document.getElementById("closeCart").addEventListener("click", function () {
document.getElementById("cartPopup").classList.add("hidden");
});

updateCartDisplay();
});



