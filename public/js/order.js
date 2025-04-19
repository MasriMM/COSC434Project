document.querySelectorAll('.order-status').forEach(select => {
    select.addEventListener('change', function() {
        const orderId = this.getAttribute('data-order-id');
        const newStatus = this.value;

        fetch(`/orders/${orderId}/update-status`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ status: newStatus }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Order status updated successfully.');
            } else {
                alert('Failed to update order status.');
            }
        });
    });
});

document.querySelectorAll('.status-dropdown').forEach(dropdown => {
    dropdown.addEventListener('change', function () {
        const orderId = this.dataset.orderId;
        const newStatus = this.value;

        fetch('/orders/update-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                order_id: orderId,
                status: newStatus
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
            } else {
               console.log(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating status.');
        });
    });
});