@extends('layout')

@section('content')
<div class="bg-zinc-950 min-h-screen py-10">
<div class="max-w-4xl mx-auto bg-zinc-900 p-8 rounded-lg border border-zinc-700 shadow text-white">
    <h1 class="text-3xl font-semibold text-white mb-6">Create New Program</h1>

    <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Program Image -->
        <div>
            <label class="block text-gray-300 mb-1 font-medium">Program Image</label>
            <input type="file" name="img" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white">
        </div>

        <!-- Program Title -->
        <div>
            <label class="block text-gray-300 mb-1 font-medium">Program Title</label>
            <input type="text" name="name" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
        </div>

        <!-- Level and Type -->
        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block text-gray-300 mb-1 font-medium">Level</label>
                <select name="level" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
                    <option value="">Choose Level</option>
                    <option value="easy">Easy</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="hard">Hard</option>
                </select>
            </div>
            <div class="flex-1">
                <label class="block text-gray-300 mb-1 font-medium">Type</label>
                <select name="type" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
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
            <textarea name="description" rows="4" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white"></textarea>
        </div>

        <!-- Duration & Sets -->
        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block text-gray-300 mb-1 font-medium">Duration (in minutes)</label>
                <input type="number" step="0.1" name="duration" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
            </div>
            <div class="flex-1">
                <label class="block text-gray-300 mb-1 font-medium">Number of Sets</label>
                <input type="number" name="sets" class="w-full px-4 py-2 bg-zinc-800 border border-zinc-700 rounded-md text-white" required>
            </div>
        </div>

        <!-- Exercises List -->
        <div>
            <label class="block text-gray-300 mb-2 font-medium">Choose Exercises</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($exercises as $exercise)
                <div class="bg-zinc-800 border border-zinc-700 rounded-lg p-4">
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
</div>
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
</script>
@endsection