<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Order #{{ $order->id }} Details</h1>

        <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
            <p><strong class="text-lg">User ID:</strong> {{ $order->user_id }}</p>
            <p><strong class="text-lg">Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
            <p><strong class="text-lg">Status:</strong> {{ $order->status }}</p>
            <p><strong class="text-lg">Created At:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
        </div>

        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Supplements in this Order:</h3>
        <div class="overflow-x-auto bg-white shadow-sm rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Supplement Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sub Total</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($order->orderSupplements as $orderSupplement)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $orderSupplement->supplement->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $orderSupplement->quantity }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${{ number_format($orderSupplement->subTotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.orders.index') }}"
               class="inline-block px-6 py-2 bg-gray-500 text-white text-sm rounded hover:bg-gray-600 transition">
                Back to Orders
            </a>
        </div>
    </div>
</x-app-layout>
