<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-white mb-6 text-center">Order #{{ $order->id }} Details</h1>

        <div class="bg-zinc-900 border border-zinc-700 rounded-lg shadow p-6 mb-6 text-white space-y-3">
            <p><span class="font-semibold text-lg">User Name:</span> {{ $order->user->name }}</p>
            <p><span class="font-semibold text-lg">Total Price:</span> ${{ number_format($order->total_price, 2) }}</p>
            <p><span class="font-semibold text-lg">Status:</span> {{ ucfirst($order->status) }}</p>
            <p><span class="font-semibold text-lg">Created At:</span> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
        </div>

        <h2 class="text-2xl font-bold text-white mb-4">Supplements in this Order</h2>
        <div class="overflow-x-auto bg-zinc-900 border border-zinc-700 rounded-lg shadow">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-zinc-800 text-gray-300">
                    <tr>
                        <th class="px-4 py-3">Supplement Name</th>
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Sub Total</th>
                    </tr>
                </thead>
                <tbody class="text-white divide-y divide-zinc-800">
                    @foreach($order->orderSupplements as $orderSupplement)
                        <tr class="hover:bg-zinc-800 transition">
                            <td class="px-4 py-2">{{ $orderSupplement->supplement->name }}</td>
                            <td class="px-4 py-2">{{ $orderSupplement->quantity }}</td>
                            <td class="px-4 py-2">${{ number_format($orderSupplement->subTotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('admin.orders.index') }}"
               class="inline-block px-6 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-800 transition">
                ← Back to Orders
            </a>
        </div>
    </div>
</x-app-layout>
