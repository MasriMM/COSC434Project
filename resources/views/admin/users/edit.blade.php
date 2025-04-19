<x-app-layout>
<div class="max-w-2xl mx-auto p-6 bg-zinc-900 rounded-lg text-white shadow border border-zinc-700">
    <h1 class="text-2xl font-bold mb-6">Edit User</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-600 text-white p-3 rounded-md">
            <ul class="text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 text-sm">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">Role</label>
            <div class="flex gap-6 items-center">
                <label class="inline-flex items-center">
                    <input type="radio" name="role" value="admin"
                        {{ old('role', $user->role) === 'admin' ? 'checked' : '' }}
                        class="form-radio h-5 w-5 text-red-600 bg-zinc-800 border-zinc-600">
                    <span class="ml-2 text-sm">Admin</span>
                </label>

                <label class="inline-flex items-center">
                    <input type="radio" name="role" value="user"
                        {{ old('role', $user->role) === 'user' ? 'checked' : '' }}
                        class="form-radio h-5 w-5 text-red-600 bg-zinc-800 border-zinc-600">
                    <span class="ml-2 text-sm">User</span>
                </label>
            </div>
        </div>


        <div class="mb-4">
            <label class="block mb-1 text-sm">Gender</label>
            <select name="gender" class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white">
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender', $user->gender) === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $user->gender) === 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">Date of Birth</label>
            <input type="date" name="dob" value="{{ old('dob', $user->dob) }}"
                class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white">
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">Height (cm)</label>
            <input type="number" step="0.01" name="height" value="{{ old('height', $user->height) }}"
                class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white">
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">Weight (kg)</label>
            <input type="number" step="0.01" name="weight" value="{{ old('weight', $user->weight) }}"
                class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white">
        </div>

        <div class="mb-6">
            <label class="block mb-1 text-sm">Goal</label>
            <select name="goal" class="w-full px-3 py-2 rounded bg-zinc-800 border border-zinc-600 text-white">
                <option value="">Select Goal</option>
                <option value="lose_weight" {{ old('goal', $user->goal) === 'lose_weight' ? 'selected' : '' }}>Lose Weight</option>
                <option value="build_muscle" {{ old('goal', $user->goal) === 'build_muscle' ? 'selected' : '' }}>Build Muscle</option>
                <option value="improve_flexibility" {{ old('goal', $user->goal) === 'improve_flexibility' ? 'selected' : '' }}>Improve Flexibility</option>
            </select>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('admin.users.index') }}"
                class="inline-block bg-zinc-700 hover:bg-zinc-600 px-6 py-2 rounded text-white font-semibold">
                Back
            </a>
            <button type="submit"
                class="bg-red-600 hover:bg-red-500 px-6 py-2 rounded text-white font-semibold">
                Update User
            </button>
        </div>
    </form>
</div>
</x-app-layout>