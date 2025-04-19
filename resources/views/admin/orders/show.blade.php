<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Order Details</h2>
    </x-slot>

    <div class="py-6 px-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-black shadow-sm rounded-lg p-6">
            <h1 class="text-white text-[30px] mb-6">Order #{{ $order->id }} Details</h1>

            <div class="bg-zinc-900 shadow-sm rounded-lg p-6 mb-6 text-white space-y-2">
                <p><strong class="text-lg">User Name:</strong> {{ $order->user->name }}</p>
                <p><strong class="text-lg">Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
                <p><strong class="text-lg">Status:</strong> {{ $order->status }}</p>
                <p><strong class="text-lg">Created At:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
            </div>

            <h3 class="text-2xl font-semibold text-white mb-4">Supplements in this Order:</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full text-left border rounded">
                    <thead class="bg-zinc-800 border-zinc-700 border-3 border text-white">
                        <tr>
                            <th class="px-4 py-2">Supplement Name</th>
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-white">
                        @foreach($order->orderSupplements as $orderSupplement)
                            <tr class="border-zinc-900 border border-t-0 hover:bg-zinc-900">
                                <td class="px-4 py-2">{{ $orderSupplement->supplement->name }}</td>
                                <td class="px-4 py-2">{{ $orderSupplement->quantity }}</td>
                                <td class="px-4 py-2">${{ number_format($orderSupplement->subTotal, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.orders.index') }}"
                   class="inline-block px-6 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-800 transition">
                    Back to Orders
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
