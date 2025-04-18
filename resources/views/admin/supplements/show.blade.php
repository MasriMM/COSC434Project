<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Supplement Details
        </h2>
    </x-slot>

    <div class="py-6 px-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg p-6 max-w-3xl mx-auto">

            <!-- Image -->
            @if ($supplement->image)
                <img src="{{ asset('storage/' . $supplement->image) }}" alt="{{ $supplement->name }}"
                    class="w-32 h-32 object-cover rounded mb-4">
            @else
                <div class="text-gray-400 mb-4">No image available.</div>
            @endif

            <!-- Info -->
            <div class="space-y-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Name:</h3>
                    <p class="text-gray-700">{{ $supplement->name }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Description:</h3>
                    <p class="text-gray-700">{{ $supplement->description ?? 'N/A' }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Price:</h3>
                    <p class="text-gray-700">${{ number_format($supplement->price, 2) }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Quantity:</h3>
                    <p class="text-gray-700">{{ $supplement->quantity }}</p>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-6 flex gap-4">
                <a href="{{ route('supplements.edit', $supplement) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                    Edit
                </a>

                <form action="{{ route('supplements.destroy', $supplement) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this supplement?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                        Delete
                    </button>
                </form>

                <a href="{{ route('supplements.index') }}"
                   class="ml-auto text-gray-600 hover:underline">
                    Back to list
                </a>
            </div>
        </div>
    </div>
</x-app-layout>