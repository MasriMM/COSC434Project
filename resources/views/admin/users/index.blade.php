<x-app-layout>
<div class="container mx-auto p-6">
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-6 gap-4">
        <h1 class="text-3xl font-bold text-white text-center">User Management</h1>

        <div class="flex justify-center">
            <form method="GET" class="flex flex-col sm:flex-row flex-wrap justify-center gap-2 items-start sm:items-center">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search..."
                    class="px-3 py-2 rounded-md bg-zinc-800 text-white border border-zinc-600 placeholder-gray-400 text-sm focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 w-full sm:w-auto" />

                <select name="role"
                    class="px-3 py-2 rounded-md bg-zinc-800 text-white border border-zinc-600 text-sm w-full sm:w-auto">
                    <option value="">All Roles</option>
                    <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User</option>
                </select>

                <select name="goal"
                    class="px-3 py-2 rounded-md bg-zinc-800 text-white border border-zinc-600 text-sm w-full sm:w-auto">
                    <option value="">All Goals</option>
                    <option value="lose_weight" {{ request('goal') === 'lose_weight' ? 'selected' : '' }}>Lose Weight</option>
                    <option value="build_muscle" {{ request('goal') === 'build_muscle' ? 'selected' : '' }}>Build Muscle</option>
                    <option value="improve_flexibility" {{ request('goal') === 'improve_flexibility' ? 'selected' : '' }}>Improve Flexibility</option>
                </select>

                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 text-sm w-full sm:w-auto">
                    Filter
                </button>
            </form>
        </div>
    </div>

    <div class="overflow-x-auto bg-zinc-900 text-gray-100 rounded-lg shadow border border-zinc-700">
        <table class="min-w-full divide-y divide-zinc-700">
            <thead class="bg-zinc-800 text-gray-300 text-sm">
                <tr>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Role</th>
                    <th class="px-4 py-3 text-left">Gender</th>
                    <th class="px-4 py-3 text-left">DOB</th>
                    <th class="px-4 py-3 text-left">Height</th>
                    <th class="px-4 py-3 text-left">Weight</th>
                    <th class="px-4 py-3 text-left">Goal</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-800 text-sm">
                @forelse($users as $user)
                <tr class="hover:bg-zinc-800 transition">
                    <td class="px-4 py-2 font-semibold text-white">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded-full text-xs font-medium 
                            {{ $user->role === 'admin' ? 'bg-red-500/20 text-red-400' : 'bg-blue-500/20 text-blue-300' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">{{ ucfirst($user->gender) ? $user->gender : '-' }}</td>
                    <td class="px-4 py-2">{{ $user->dob ? $user->dob : '-' }}</td>
                    <td class="px-4 py-2">{{ $user->height ? $user->height . ' cm' : '-' }}</td>
                    <td class="px-4 py-2">{{ $user->weight ? $user->weight . ' kg' : '-' }}</td>
                    <td class="px-4 py-2">
                        @php
                            $goalColors = [
                                'lose_weight' => 'bg-yellow-400/20 text-yellow-300',
                                'build_muscle' => 'bg-green-400/20 text-green-300',
                                'improve_flexibility' => 'bg-purple-400/20 text-purple-300',
                            ];
                        @endphp
                        @if ($user->goal)
                            <span class="inline-block mt-1 px-2 py-1 rounded-full text-xs font-medium {{ $goalColors[$user->goal] ?? 'bg-gray-600 text-white' }}">
                                {{ $user->goal ? $user->goal : '-' }}
                            </span>
                        @else
                            <span class="text-gray-500">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center">
                        <div class="flex justify-center items-center space-x-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-400 hover:text-blue-300 transition">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 transition">
                                    <i class="fas fa-trash mr-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center py-6 text-gray-500">No users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<a href="{{ route('admin.users.create') }}"
   class="fixed bottom-6 right-6 z-50 bg-red-600 hover:bg-red-500 text-white px-5 py-3 rounded-full shadow-lg text-sm font-semibold flex items-center gap-2 transition">
    <i class="fas fa-user-plus"></i> Add User
</a>
</x-app-layout>