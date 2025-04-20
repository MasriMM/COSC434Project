<x-app-layout>
<div class="bg-zinc-900 text-white px-6 py-10 min-h-screen">
    <h1 class="text-4xl font-extrabold text-white mb-5 tracking-wide">Statistics Dashboard</h1>

    <div class="mb-5 bg-zinc-800/60 backdrop-blur-md p-6 rounded-2xl shadow-lg border border-rose-500">
        <h2 class="text-2xl font-semibold text-zinc-300 mb-3">User of the Month</h2>
        @if ($userOfMonth)
            <p class="text-lg text-gray-200">
                <span class="font-bold text-rose-400">{{ $userOfMonth->name }}</span>
                <span class="text-sm text-gray-400 ml-2">({{ $userOfMonth->email }})</span>
            </p>
        @else
            <p class="text-gray-400">No user activity recorded.</p>
        @endif
    </div>

    <div class="bg-zinc-800/60 backdrop-blur-md p-6 rounded-2xl shadow-lg border border-rose-500 mb-5">
        <h2 class="text-2xl font-semibold text-zinc-300 mb-4">Top Supplements Chart</h2>
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                <canvas id="supplementChart" height="250"></canvas>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // top supplements chart
    const supplementCtx = document.getElementById('supplementChart').getContext('2d');
new Chart(supplementCtx, {
    type: 'doughnut',
    data: {
        labels: {!! json_encode($topSupplements->pluck('name')) !!},
        datasets: [{
            label: 'Units Bought',
            data: {!! json_encode($topSupplements->pluck('total_quantity')) !!},
            backgroundColor: [
                'rgba(244, 63, 94, 0.8)', // rose-500
                'rgba(251, 113, 133, 0.8)', // rose-400
                'rgba(253, 164, 175, 0.8)', // rose-300
                'rgba(254, 205, 211, 0.8)', // rose-200
                'rgba(255, 228, 230, 0.8)'  // rose-100
            ],
            borderWidth: 2,
            borderColor: '#1f1f1f'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    color: '#f5f5f5',
                    padding: 20
                }
            }
        }
    }
});
</script>
</x-app-layout>