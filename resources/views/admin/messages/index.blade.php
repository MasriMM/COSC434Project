<x-app-layout>
<div class="min-h-screen flex items-center justify-center bg-zinc-900 px-4">
    <div class="max-w-7xl w-full">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-10 my-4">
            <h1 class="text-3xl font-bold text-white">Users' Messages</h1>
            <form method="GET" action="{{ route('admin.messages.index') }}" class="flex items-center">
                <label for="sort" class="text-white text-sm mr-2">Sort by:</label>
                <select name="sort" id="sort" onchange="this.form.submit()" class="bg-zinc-800 text-white border border-rose-400 focus:border-rose-500 focus:ring-rose-500 rounded px-3 py-1 pr-8">
                    <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>Newest First</option>
                    <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>Oldest First</option>
                </select>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-8 pl-8 pr-8">
            @foreach ($messages as $message)
                <div class="rounded-xl border border-rose-400 bg-zinc-800 text-white p-6 shadow-md transition-transform transform hover:scale-[1.015] hover:shadow-lg duration-200">
                    <div class="flex items-center space-x-4 mb-4">
                        <!-- Icon -->
                        <div class="text-3xl text-rose-400">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <!-- Name and Subject -->
                        <div>
                            <div class="text-lg font-semibold text-rose-400">
                                {{ $message->first_name }} {{ $message->last_name }}
                            </div>
                            <div class="text-sm text-gray-300"> 
                                <strong>Email:</strong> {{ $message->email }}
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="text-sm text-gray-400 mb-2">
                        {{ $message->subject }}
                    </div>

                    <!-- Content -->
                    <p class="text-sm text-gray-200">
                        {{ $message->content }}
                    </p>

                    <!-- Date -->
                    <div class="text-xs text-gray-500 mt-4 text-right">
                        {{ $message->created_at->format('M d, Y H:i') }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</x-app-layout>