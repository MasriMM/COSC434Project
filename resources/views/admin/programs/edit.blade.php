<x-app-layout>
    <div class="py-5">
    <div class="max-w-4xl mx-auto bg-zinc-900 p-8 rounded-lg border border-zinc-700 shadow text-white">
        <h1 class="text-3xl font-semibold text-white mb-6">Edit Program</h1>
    
        <form action="{{ route('admin.programs.update', $program->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
    
            <!-- Program Image -->
            @if($program->img)
            <div>
                <label class="block text-gray-300 mb-1 font-medium">Current Image</label>
                <img src="{{ asset($program->img) }}" alt="Current Program Image" class="w-40 rounded shadow mb-3">
            </div>
            @endif
    
            <div>
                <label class="block text-gray-300 mb-1 font-medium">Change Image</label>
                <input type="file" name="img" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white">
            </div>
    
            <!-- Title -->
            <div>
                <label class="block text-gray-300 mb-1 font-medium">Program Title</label>
                <input type="text" name="name" value="{{ old('name', $program->name) }}" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
            </div>
    
            <!-- Level and Type -->
            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="block text-gray-300 mb-1 font-medium">Level</label>
                    <select name="level" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
                        <option value="easy" {{ $program->level == 'easy' ? 'selected' : '' }}>Easy</option>
                        <option value="intermediate" {{ $program->level == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                        <option value="hard" {{ $program->level == 'hard' ? 'selected' : '' }}>Hard</option>
                    </select>
                </div>
                <div class="flex-1">
                    <label class="block text-gray-300 mb-1 font-medium">Type</label>
                    <select name="type" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
                        <option value="lose_weight" {{ $program->type == 'lose_weight' ? 'selected' : '' }}>Lose Weight</option>
                        <option value="build_muscle" {{ $program->type == 'build_muscle' ? 'selected' : '' }}>Build Muscle</option>
                        <option value="improve_flexibility" {{ $program->type == 'improve_flexibility' ? 'selected' : '' }}>Improve Flexibility</option>
                    </select>
                </div>
            </div>
    
            <!-- Description -->
            <div>
                <label class="block text-gray-300 mb-1 font-medium">Description</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white">{{ old('description', $program->description) }}</textarea>
            </div>
    
            <!-- Duration and Sets -->
            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="block text-gray-300 mb-1 font-medium">Duration (minutes)</label>
                    <input type="number" name="duration" value="{{ old('duration', $program->duration) }}" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
                </div>
                <div class="flex-1">
                    <label class="block text-gray-300 mb-1 font-medium">Number of Sets</label>
                    <input type="number" name="sets" value="{{ old('sets', $program->sets) }}" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
                </div>
            </div>
    
            <!-- Preselected Exercises -->
            <div>
                <label class="block text-gray-300 mb-2 font-medium">Selected Exercises</label>
                <div id="selected-exercises" class="space-y-2">
                    @foreach($program->exercises as $exercise)
                        <div class="flex gap-4 items-center" data-id="{{ $exercise->id }}">
                            <input type="hidden" name="exercises[{{ $exercise->id }}][id]" value="{{ $exercise->id }}">
                            <p class="flex-1 text-white">{{ $exercise->name }}</p>
                            <input type="number" name="exercises[{{ $exercise->id }}][reps]" value="{{ $exercise->pivot->reps }}" placeholder="Reps"
                                class="w-24 px-2 py-1 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
                            <button type="button" onclick="removeExercise({{ $exercise->id }})" class="text-red-500 font-bold text-xl leading-none">x</button>
                        </div>
                    @endforeach
                </div>
            </div>
    
            <!-- Available Exercises to Add -->
            <div class="mt-8">
                <label class="block text-gray-300 mb-2 font-medium">Add More Exercises</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($exercises as $exercise)
                        @if (!in_array($exercise->id, $program->exercises->pluck('id')->toArray()))
                            <div class="bg-zinc-800 border border-zinc-700 rounded-lg p-4">
                                <div class="flex items-center gap-4">
                                    @if ($exercise->img)
                                        <img src="{{ asset($exercise->img) }}" alt="{{ $exercise->name }}" class="w-16 h-16 rounded object-cover border border-zinc-700">
                                    @endif
    
                                    <div class="flex-1">
                                        <p class="font-semibold text-white">{{ $exercise->name }}</p>
                                        <p class="text-sm text-gray-400">{{ ucfirst($exercise->difficulty) }}</p>
                                    </div>
    
                                    <button type="button" onclick="addExercise({{ $exercise->id }}, '{{ $exercise->name }}')" class="bg-red-500 hover:bg-red-400 px-3 py-1 text-sm rounded-md text-white">
                                        Add
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
    
            <!-- Submit -->
            <button type="submit" class="bg-red-600 hover:bg-red-500 px-6 py-2 text-white rounded-md font-medium mt-6">
                Update Program
            </button>
        </form>
    </div>
    </div>
    
    <!-- Scripts -->
    <script>
        let selectedExercises = @json($program->exercises->pluck('id')->toArray());
    
        function addExercise(id, name) {
            if (selectedExercises.includes(id)) return;
    
            selectedExercises.push(id);
    
            const container = document.getElementById('selected-exercises');
            const wrapper = document.createElement('div');
            wrapper.classList.add('flex', 'gap-4', 'items-center', 'mt-2');
            wrapper.setAttribute('data-id', id);
            wrapper.innerHTML = `
                <input type="hidden" name="exercises[${id}][id]" value="${id}">
                <p class="flex-1 text-white">${name}</p>
                <input type="number" name="exercises[${id}][reps]" placeholder="Reps" class="w-24 px-2 py-1 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
                <button type="button" onclick="removeExercise(${id})" class="text-red-500 font-bold text-xl leading-none">x</button>
            `;
            container.appendChild(wrapper);
        }
    
        function removeExercise(id) {
            selectedExercises = selectedExercises.filter(e => e !== id);
            const el = document.querySelector(`[data-id='${id}']`);
            if (el) el.remove();
        }
    </script>
    </x-app-layout>
    