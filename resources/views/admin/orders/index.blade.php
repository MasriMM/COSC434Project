<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Orders</h2>
    </x-slot>

    <div class="py-6 px-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-black shadow-sm rounded-lg p-6">
            <h1 class="text-white text-[30px] mb-4">Orders Management</h1>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-800 text-green-100 border border-green-600 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full text-left border rounded">
                    <thead class="bg-zinc-800 border-zinc-700 border-3 border text-white">
                        <tr>
                            <th class="px-4 py-2">Order ID</th>
                            <th class="px-4 py-2">User ID</th>
                            <th class="px-4 py-2">Total Price</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Created At</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-white">
                        @foreach($orders as $order)
                            <tr class="border-zinc-900 border border-t-0 hover:bg-zinc-900" data-id="{{ $order->id }}">
                                <td class="px-4 py-2">{{ $order->id }}</td>
                                <td class="px-4 py-2">{{ $order->user_id }}</td>
                                <td class="px-4 py-2">${{ number_format($order->total_price, 2) }}</td>
                                <td class="px-4 py-2">{{ $order->status }}</td>
                                <td class="px-4 py-2">{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                                <td class="px-4 py-2 space-x-2">
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                       class="inline-block px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-800 transition">
                                        View
                                    </a>
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-800 transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
