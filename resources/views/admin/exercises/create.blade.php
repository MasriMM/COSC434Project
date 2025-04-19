<x-app-layout>
<div class="py-5">
<div class="max-w-3xl mx-auto bg-zinc-900 p-8 rounded-lg border border-zinc-700 shadow text-white">
    <h1 class="text-3xl font-semibold text-white mb-6">Add New Exercise</h1>

    <form action="{{ route('admin.exercises.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Image Upload -->
        <div>
            <label class="block text-gray-300 mb-1 font-medium">Exercise Image</label>
            <input type="file" name="img" accept="image/*" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Name -->
        <div>
            <label class="block text-gray-300 mb-1 font-medium">Exercise Name</label>
            <input type="text" name="name" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-gray-300 mb-1 font-medium">Description</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500"></textarea>
        </div>

        <!-- Difficulty -->
        <div>
            <label class="block text-gray-300 mb-1 font-medium">Difficulty</label>
            <select name="difficulty" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
                <option value="">Choose Difficulty</option>
                <option value="easy">Easy</option>
                <option value="intermediate">Intermediate</option>
                <option value="hard">Hard</option>
            </select>
        </div>

        <!-- Muscle Groups -->
        <div>
            <label class="block text-gray-300 mb-1 font-medium focus:ring-1 focus:ring-red-500 focus:border-red-500">Targeted Muscle Groups</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach ($muscleGroups as $group)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="muscle_groups[]" value="{{ $group->id }}" class="bg-zinc-700 text-red-500 focus:ring-red-500">
                        <span>{{ $group->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Submit -->
        <button type="submit" class="bg-red-600 hover:bg-red-500 px-6 py-2 text-white rounded-md font-medium">
            Save Exercise
        </button>
    </form>
</div>
</div>
</x-app-layout>