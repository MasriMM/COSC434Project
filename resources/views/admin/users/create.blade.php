<x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css">
<div class="py-5">
<div class="max-w-4xl mx-auto p-6 bg-zinc-900 rounded-lg text-white shadow border border-zinc-700">
    <h1 class="text-2xl font-bold mb-6">Add New User</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-600 text-white p-3 rounded-md">
            <ul class="text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST"">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 text-sm">Name</label>
            <input type="text" name="name" class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">Email</label>
            <input type="email" name="email" class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">Password</label>
            <input type="password" name="password" class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">Role</label>
            <select name="role" class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white focus:ring-1 focus:ring-red-500 focus:border-red-500" required>
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">Gender</label>
            <select name="gender" class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white focus:ring-1 focus:ring-red-500 focus:border-red-500">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">Date of Birth</label>
            <input type="text" name="dob" id="dobPicker"
                class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white focus:ring-1 focus:ring-red-500 focus:border-red-500"
                placeholder="Select Date">
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">Height (cm)</label>
            <input type="number" step="0.01" name="height" class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white focus:ring-1 focus:ring-red-500 focus:border-red-500">
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">Weight (kg)</label>
            <input type="number" step="0.01" name="weight" class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white focus:ring-1 focus:ring-red-500 focus:border-red-500">
        </div>

        <div class="mb-6">
            <label class="block mb-1 text-sm">Goal</label>
            <select name="goal" class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white focus:ring-1 focus:ring-red-500 focus:border-red-500">
                <option value="">Select Goal</option>
                <option value="lose_weight">Lose Weight</option>
                <option value="build_muscle">Build Muscle</option>
                <option value="improve_flexibility">Improve Flexibility</option>
            </select>
        </div>
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.users.index') }}"
                class="inline-block bg-zinc-700 hover:bg-zinc-600 px-6 py-2 rounded text-white font-semibold">
                Back
            </a>
            <button type="submit"
                class="bg-red-600 hover:bg-red-500 px-6 py-2 rounded text-white font-semibold">
                Add User
            </button>
        </div>
    </form>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#dobPicker", {
        dateFormat: "Y-m-d",
        maxDate: "today",
        defaultDate: "{{ old('dob') }}"
    });
</script>
</x-app-layout>