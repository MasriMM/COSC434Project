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
            body {
                background: linear-gradient(145deg, #0e0e0e, #1a1a1a);
                color: #fff;
                font-family: 'Poppins', sans-serif;
            }

            .info-block {
                background: #1e1e1e;
                padding: 40px;
                border-radius: 16px;
                color: white;
                text-align: center;
                max-width: 700px;
                margin: auto;
                border: 1px solid #e63946;
                box-shadow: 0 0 20px rgba(255, 0, 0, 0.1);
                animation: fadeIn 1.2s ease-in-out;
                position: relative;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .info-block img {
                display: block;
                margin: 0 auto 25px;
                width: 100%;
                max-width: 320px;
                border-radius: 10px;
                transition: all 0.4s ease;
                
            }

            .info-block img:hover {
                transform: scale(1.03);
                box-shadow: 0 0 30px rgba(230, 57, 70, 0.6);
            }

            .main-border-button,
            .btn-back {
                padding: 10px 24px;
                font-size: 14px;
                border: 2px solid #e63946;
                border-radius: 6px;
                font-weight: 600;
                text-transform: uppercase;
                color: #e63946;
                background: transparent;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-block;
            }

            .main-border-button:hover,
            .btn-back:hover {
                background: #e63946;
                color: #fff;
                box-shadow: 0 0 10px #e63946;
            }

            .main-border-button {
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0% { box-shadow: 0 0 0 0 rgba(230, 57, 70, 0.7); }
                70% { box-shadow: 0 0 0 10px rgba(230, 57, 70, 0); }
                100% { box-shadow: 0 0 0 0 rgba(230, 57, 70, 0); }
            }

            .dropdown-trigger {
                position: absolute;
                top: 15px;
                right: 15px;
                font-size: 24px;
                cursor: pointer;
                color: #e63946;
                background: transparent;
                border: none;
            }

            .dropdown-menu {
                position: absolute;
                top: 50px;
                right: 15px;
                background: #2e2e2e;
                border: 1px solid #e63946;
                padding: 0;
                border-radius: 6px;
                display: none;
                min-width: 160px;
                z-index: 999;
            }

            .dropdown-menu.show {
                display: block;
            }

            .dropdown-menu button {
                background: none;
                border: none;
                color: white;
                padding: 12px 20px;
                width: 100%;
                text-align: left;
                cursor: pointer;
                transition: background 0.2s;
            }

            .dropdown-menu button:hover {
                background-color: #e63946;
            }

            ul.list-unstyled {
                padding: 0;
                margin-top: 10px;
            }

            ul.list-unstyled li {
                list-style: none;
                margin-bottom: 5px;
            }

            h2 {
                color: #e63946;
            }

            strong {
                color: #e63946;
            }
        </style>
    @endsection

    <div class="container py-5">
        <div class="info-block">
            <!-- Dropdown for Delete -->
            <button class="dropdown-trigger" onclick="toggleDropdown()">⋮</button>
            <div class="dropdown-menu" id="dropdownMenu">
                <form action="{{ route('admin.exercises.destroy', $exercise->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this exercise?')">
                        Delete Exercise
                    </button>
                </form>
            </div>

            <!-- Exercise Image & Info -->
            <img src="{{ asset($exercise->img ?? 'assets/images/workout-01.jpg') }}" alt="{{ $exercise->name }}">
            <h2 class="fw-bold mb-3">{{ $exercise->name }}</h2>
            <p><strong>Difficulty:</strong> {{ ucfirst($exercise->difficulty) }}</p>
            <p><strong>Added on:</strong> {{ $exercise->created_at->format('d M Y') }}</p>
            <p class="mt-3"><strong>Description:</strong><br>{{ $exercise->description ?? 'No description available.' }}</p>

            @if($exercise->muscleGroups->count())
                <p class="mt-4"><strong>Targeted Muscle Groups:</strong></p>
                <ul class="list-unstyled">
                    @foreach ($exercise->muscleGroups as $muscle)
                        <li>- {{ $muscle->name }}</li>
                    @endforeach
                </ul>
            @else
                <p class="mt-3"><strong>Targeted Muscle Groups:</strong> None assigned.</p>
            @endif

            <!-- Edit & Back Buttons -->
            <div class="mt-4">
                <a href="{{ route('admin.exercises.edit', $exercise->id) }}" class="main-border-button">Edit</a>
            </div>

            <div class="mt-3">
                <a href="{{ route('admin.exercises.index') }}" class="btn-back">← Back to All Exercises</a>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            function toggleDropdown() {
                document.getElementById('dropdownMenu').classList.toggle('show');
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
