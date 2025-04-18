<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Supplement
        </h2>
    </x-slot>

    <div class="py-6 px-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg p-6 max-w-3xl mx-auto">

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('supplements.update', $supplement) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name', $supplement->name) }}" class="w-full border rounded p-2" required>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Description</label>
                    <textarea name="description" class="w-full border rounded p-2" rows="4">{{ old('description', $supplement->description) }}</textarea>
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Price</label>
                    <input type="number" name="price" value="{{ old('price', $supplement->price) }}" step="0.01" class="w-full border rounded p-2" required>
                </div>

                <!-- Quantity -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity', $supplement->quantity) }}" class="w-full border rounded p-2" required>
                </div>

                <!-- Image Upload -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Image</label>
                    <input type="file" name="image" class="w-full border rounded p-2">
                    @if ($supplement->image)
                        <img src="{{ asset('storage/' . $supplement->image) }}" alt="Supplement Image" class="w-24 h-24 object-cover rounded mt-2">
                    @endif
                </div>

                <!-- Submit -->
                <div class="mt-6 flex items-center gap-4">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Update
                    </button>
                    <a href="{{ route('supplements.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>