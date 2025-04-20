<x-app-layout>
    @section('styles')
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/admin-exersice/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin-exersice/templatemo-cyborg-gaming.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin-exersice/owl.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin-exersice/animate.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
        <style>
            .info-block {
                background: #1e1e1e;
                padding: 30px;
                border-radius: 10px;
                color: white;
                text-align: center;
                max-width: 600px;
                margin: auto;
                position: relative;
            }

            .info-block img {
                display: block;
                margin: 0 auto 20px;
                width: 100%;
                max-width: 300px;
                border-radius: 10px;
            }

            .main-border-button {
                padding: 4px 10px;
                font-size: 12px;
                white-space: nowrap;
                border: 1px solid #fff;
                border-radius: 6px;
                text-transform: uppercase;
                font-weight: 600;
                display: inline-block;
                color: white;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .main-border-button:hover {
                background-color: white;
                color: #1e1e1e;
            }

            .dropdown-trigger {
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 22px;
                cursor: pointer;
                color: white;
                background: transparent;
                border: none;
            }

            .dropdown-menu {
                position: absolute;
                top: 40px;
                right: 10px;
                background: #333;
                border: 1px solid #555;
                padding: 8px 0;
                border-radius: 6px;
                display: none;
                z-index: 10;
            }

            .dropdown-menu.show {
                display: block;
            }

            .dropdown-menu button {
                background: none;
                border: none;
                color: white;
                padding: 8px 16px;
                width: 100%;
                text-align: left;
                cursor: pointer;
            }

            .btn-back {
                border: 1px solid #fff;
                border-radius: 6px;
                padding: 6px 14px;
                font-weight: 600;
                color: white;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .btn-back:hover {
                background-color: white;
                color: #1e1e1e;
            }
        </style>
    @endsection

    <div class="container py-5">
        <div class="info-block">

            <!-- Delete in 3-dot dropdown -->
            <button class="dropdown-trigger" onclick="toggleDropdown()">⋮</button>
            <div class="dropdown-menu" id="dropdownMenu">
                <form action="{{ route('admin.exercises.destroy', $exercise->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this exercise?')">
                        Delete
                    </button>
                </form>
            </div>

            <!-- Exercise Content -->
            <img src="{{ asset($exercise->img ?? 'assets/images/workout-01.jpg') }}" alt="{{ $exercise->name }}">
            <h2>{{ $exercise->name }}</h2>
            <p><strong>Difficulty:</strong> {{ ucfirst($exercise->difficulty) }}</p>
            <p><strong>Added on:</strong> {{ $exercise->created_at->format('d M Y') }}</p>
            <p><strong>Description:</strong><br>{{ $exercise->description ?? 'No description available.' }}</p>

            @if($exercise->muscleGroups->count())
                <p><strong>Targeted Muscle Groups:</strong></p>
                <ul class="list-unstyled">
                    @foreach ($exercise->muscleGroups as $muscle)
                        <li>- {{ $muscle->name }}</li>
                    @endforeach
                </ul>
            @else
                <p><strong>Targeted Muscle Groups:</strong> None assigned.</p>
            @endif

            <!-- Edit Button -->
            <div class="mt-4 text-center">
                <a href="{{ route('admin.exercises.edit', $exercise->id) }}" class="main-border-button">Edit</a>
            </div>

            <!-- Back Button -->
            <div class="mt-3 text-center">
                <a href="{{ route('admin.exercises.index') }}" class="btn-back">← Back to All Exercises</a>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            function toggleDropdown() {
                const menu = document.getElementById('dropdownMenu');
                menu.classList.toggle('show');
            }

            window.addEventListener('click', function (e) {
                const trigger = document.querySelector('.dropdown-trigger');
                const menu = document.getElementById('dropdownMenu');
                if (!trigger.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.remove('show');
                }
            });
        </script>

        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/isotope.min.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/owl-carousel.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/tabs.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/popup.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/custom.js') }}"></script>
    @endsection
</x-app-layout>
