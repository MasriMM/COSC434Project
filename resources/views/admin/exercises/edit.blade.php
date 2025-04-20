<x-app-layout>
    <div class="py-5">
    <div class="max-w-3xl mx-auto bg-zinc-900 p-8 rounded-lg border border-zinc-700 shadow text-white">
        <h1 class="text-3xl font-semibold text-white mb-6">Edit Exercise</h1>
    
        <form action="{{ route('admin.exercises.update', $exercise->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
    
            <!-- Current Image -->
            @if($exercise->img)
            <div>
                <label class="block text-gray-300 mb-1 font-medium">Current Image</label>
                <img src="{{ asset($exercise->img) }}" alt="Current Exercise Image" class="w-40 rounded shadow mb-3">
            </div>
            @endif
    
            <!-- Image Upload -->
            <div>
                <label class="block text-gray-300 mb-1 font-medium">Change Image</label>
                <input type="file" name="img" accept="image/*" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500">
            </div>
    
            <!-- Name -->
            <div>
                <label class="block text-gray-300 mb-1 font-medium">Exercise Name</label>
                <input type="text" name="name" value="{{ old('name', $exercise->name) }}" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
            </div>
    
            <!-- Description -->
            <div>
                <label class="block text-gray-300 mb-1 font-medium">Description</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500">{{ old('description', $exercise->description) }}</textarea>
            </div>
    
            <!-- Difficulty -->
            <div>
                <label class="block text-gray-300 mb-1 font-medium">Difficulty</label>
                <select name="difficulty" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
                    <option value="">Choose Difficulty</option>
                    <option value="easy" {{ $exercise->difficulty == 'easy' ? 'selected' : '' }}>Easy</option>
                    <option value="intermediate" {{ $exercise->difficulty == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="hard" {{ $exercise->difficulty == 'hard' ? 'selected' : '' }}>Hard</option>
                </select>
            </div>
    
            <!-- Muscle Groups -->
            <div>
                <label class="block text-gray-300 mb-1 font-medium">Targeted Muscle Groups</label>
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($muscleGroups as $group)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="muscle_groups[]" value="{{ $group->id }}"
                                   class="bg-zinc-700 text-red-500 focus:ring-red-500"
                                   {{ in_array($group->id, $exercise->muscleGroups->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <span>{{ $group->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
    
            <!-- Submit -->
            <button type="submit" class="bg-red-600 hover:bg-red-500 px-6 py-2 text-white rounded-md font-medium">
                Update Exercise
            </button>
        </form>
    </div>
    </div>
    </x-app-layout>
    