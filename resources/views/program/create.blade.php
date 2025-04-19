@extends('layout')

@section('title', 'Add New Program') 

@section('content')
<div class="max-w-4xl mx-auto bg-zinc-900 p-8 rounded-lg border border-zinc-700 shadow text-white focus:ring-1 focus:ring-red-500 focus:border-red-500">
    <h1 class="text-3xl font-semibold text-white mb-6">Create New Program</h1>

    <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Program Image -->
        <div>
            <label class="block text-gray-300 mb-1 font-medium">Program Image</label>
            <input type="file" name="img" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500">
        </div>

        <!-- Program Title -->
        <div>
            <label class="block text-gray-300 mb-1 font-medium">Program Title</label>
            <input type="text" name="name" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
        </div>

        <!-- Level and Type -->
        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block text-gray-300 mb-1 font-medium">Level</label>
                <select name="level" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
                    <option value="">Choose Level</option>
                    <option value="easy">Easy</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="hard">Hard</option>
                </select>
            </div>
            <div class="flex-1">
                <label class="block text-gray-300 mb-1 font-medium">Type</label>
                <select name="type" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
                    <option value="">Choose Type</option>
                    <option value="lose_weight">Lose Weight</option>
                    <option value="build_muscle">Build Muscle</option>
                    <option value="improve_flexibility">Improve Flexibility</option>
                </select>
            </div>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-gray-300 mb-1 font-medium">Description</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500"></textarea>
        </div>

        <!-- Duration & Sets -->
        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block text-gray-300 mb-1 font-medium">Duration (in minutes)</label>
                <input type="number" step="0.1" name="duration" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
            </div>
            <div class="flex-1">
                <label class="block text-gray-300 mb-1 font-medium">Number of Sets</label>
                <input type="number" name="sets" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
            </div>
        </div>

        <!-- Filtering -->
        <div class="flex flex-col md:flex-row md:items-center gap-4 mb-4">
            <div class="flex-1">
                <label class="block text-gray-300 mb-1 font-medium">Filter by Difficulty</label>
                <select id="filter-difficulty" onchange="filterExercises()" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500">
                    <option value="">All</option>
                    <option value="easy">Easy</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="hard">Hard</option>
                </select>
            </div>

            <div class="flex-1">
                <label class="block text-gray-300 mb-1 font-medium">Filter by Muscle Group</label>
                <select id="filter-muscle" onchange="filterExercises()" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white focus:ring-1 focus:ring-red-500 focus:border-red-500">
                    <option value="">All</option>
                    @foreach ($muscleGroups as $group)
                        <option value="{{ strtolower($group->name) }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Exercises List -->
        <div>
            <label class="block text-gray-300 mb-2 font-medium">Choose Exercises</label>
            <div id="exercise-list" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($exercises as $exercise)
                <div class="bg-zinc-800 border border-zinc-700 rounded-lg p-4"
                     data-difficulty="{{ strtolower($exercise->difficulty) }}"
                     data-muscles="{{ strtolower($exercise->muscleGroups->pluck('name')->implode(',')) }}">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-white">{{ $exercise->name }}</p>
                            <p class="text-sm text-gray-400">{{ $exercise->difficulty }}</p>
                        </div>
                        <button type="button" onclick="addExercise({{ $exercise->id }}, '{{ $exercise->name }}')" class="bg-red-500 hover:bg-red-400 px-3 py-1 text-sm rounded-md text-white">
                            Add
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Selected Exercises -->
        <div>
            <label class="block text-gray-300 mb-2 font-medium">Selected Exercises</label>
            <div id="selected-exercises" class="space-y-2"></div>
        </div>

        <!-- Submit -->
        <button type="submit" class="bg-red-600 hover:bg-red-500 px-6 py-2 text-white rounded-md font-medium">
            Save Program
        </button>
    </form>
</div>

<!-- Script -->
<script>
    let selectedExercises = {};

    function addExercise(id, name) {
        if (selectedExercises[id]) return;

        selectedExercises[id] = true;

        const container = document.getElementById('selected-exercises');
        const wrapper = document.createElement('div');
        wrapper.classList.add('flex', 'gap-4', 'items-center');
        wrapper.setAttribute('data-id', id);
        wrapper.innerHTML = `
            <input type="hidden" name="exercises[${id}][id]" value="${id}">
            <p class="flex-1 text-white">${name}</p>
            <input type="number" name="exercises[${id}][reps]" placeholder="Reps" class="w-24 px-2 py-1 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
            <button type="button" onclick="removeExercise(${id})" class="text-red-500 font-bold text-xl leading-none">×</button>
        `;
        container.appendChild(wrapper);
    }

    function removeExercise(id) {
        delete selectedExercises[id];
        const el = document.querySelector(`[data-id='${id}']`);
        if (el) el.remove();
    }

    function filterExercises() {
        const selectedDifficulty = document.getElementById('filter-difficulty').value.toLowerCase();
        const selectedMuscle = document.getElementById('filter-muscle').value.toLowerCase();

        document.querySelectorAll('#exercise-list > div').forEach(exerciseCard => {
            const difficulty = exerciseCard.getAttribute('data-difficulty');
            const muscles = exerciseCard.getAttribute('data-muscles');

            const difficultyMatch = !selectedDifficulty || difficulty === selectedDifficulty;
            const muscleMatch = !selectedMuscle || muscles.includes(selectedMuscle);

            exerciseCard.style.display = (difficultyMatch && muscleMatch) ? 'block' : 'none';
        });
    }
</script>
@endsection