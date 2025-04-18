document.addEventListener("DOMContentLoaded", function () {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    const cartItemsElement = document.getElementById("cartItems");
    const totalPriceElement = document.getElementById("totalPrice");
    const popupModal = document.getElementById("popupModal");
    const closePopupButton = document.getElementById("closePopup");

    // Display cart items
    if (cart.length === 0) {
        cartItemsElement.innerHTML = "<p class='text-center text-gray-400'>Your cart is empty.</p>";
    } else {
        let total = 0;
        cartItemsElement.innerHTML = cart.map(item => {
            total += item.price;
            return `
                <div class="flex justify-between py-2 border-b border-gray-700">
                    <span>${item.name}</span>
                    <span>$${item.price.toFixed(2)}</span>
                </div>
            `;
        }).join("");
        totalPriceElement.textContent = `$${total.toFixed(2)}`;
    }

    // Handle complete purchase
    document.getElementById("completePurchase").addEventListener("click", function () {
        if (cart.length === 0) {
            alert("Your cart is empty.");
            return;
        }

        const firstName = document.getElementById("firstName").value.trim();
        const lastName = document.getElementById("lastName").value.trim();
        const cardNumber = document.getElementById("cardNumber").value.trim();
        const expiryDate = document.getElementById("expiryDate").value.trim();
        const cvv = document.getElementById("cvv").value.trim();

        if (!firstName || !lastName || !cardNumber || !expiryDate || !cvv) {
            alert("Please fill out all payment details.");
            return;
        }

        fetch("{{ route('checkout.process') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
            body: JSON.stringify({
                cart,
                firstName,
                lastName,
                cardNumber,
                expiryDate,
                cvv
            })
        })
            .then(response => response.json())
            .then(data => {
                console.log("Server Response:", data);

                if (data.success) {
                    popupModal.classList.remove("hidden");
                    localStorage.removeItem("cart");
                } else {
                    alert("Error processing payment. Please try again.");
                }
            })
            .catch(error => {
                console.error("Error during payment:", error);
                alert("Failed to process the purchase.");
            });
    });

    closePopupButton.addEventListener("click", function () {
        popupModal.classList.add("hidden");
        window.location.href = "{{ route('supplements') }}";
    });
});