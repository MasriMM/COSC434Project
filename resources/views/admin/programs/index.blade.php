<x-app-layout>
    @section('styles')
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <style>
            body {
                background-color: #0e0e0e;
                color: #000000;
                font-family: 'Poppins', sans-serif;
            }

            .item {
                background: #1e1e1e;
                border-radius: 12px;
                padding: 15px;
                text-align: center;
                margin-bottom: 30px;
                position: relative;
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.05);
                width: 100%;
                max-width: 280px;
                height: 380px;
                overflow: hidden;
                margin-left: auto;
                margin-right: auto;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .item img {
                width: 100%;
                height: 160px;
                object-fit: cover;
                border-radius: 8px;
            }

            .game-title {
                font-size: 18px;
                font-weight: 600;
                color: #fff;
            }

            .game-desc {
                font-size: 13px;
                color: #aaa;
                line-height: 1.5;
            }

            .menu-container {
                position: absolute;
                top: 15px;
                right: 15px;
            }

            .menu-toggle {
                background: transparent;
                border: none;
                font-size: 24px;
                color: #fff;
                cursor: pointer;
                line-height: 1;
            }

            .menu-options {
                position: absolute;
                top: 35px;
                right: 0;
                background-color: #111;
                border: 1px solid #444;
                border-radius: 8px;
                padding: 8px 12px;
                display: none;
                flex-direction: column;
                gap: 10px;
                z-index: 100;
                box-shadow: 0 0 10px #000;
                min-width: 100px;
            }

            .menu-options a,
            .menu-options button {
                background-color: #222;
                color: #fff;
                padding: 6px 12px;
                border-radius: 20px;
                font-size: 13px;
                text-align: center;
                border: none;
                cursor: pointer;
                transition: 0.3s ease;
                text-decoration: none;
                display: block;
                width: 100%;
            }

            .menu-options a:hover,
            .menu-options button:hover {
                background-color: #e31515;
                color: #fff;
            }

            .menu-container.active .menu-options {
                display: flex;
            }

            .fab {
                position: fixed;
                bottom: 30px;
                right: 30px;
                width: 60px;
                height: 60px;
                background-color: #e31515;
                border: none;
                border-radius: 50%;
                color: white;
                font-size: 28px;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 15px rgba(0,0,0,0.3);
                cursor: pointer;
                z-index: 2000;
                transition: background-color 0.3s ease;
            }

            .fab:hover {
                background-color: #b30f0f;
            }
        </style>
    @endsection

    <div class="container py-5">
        <div class="row">
            @foreach ($programs as $program)
                <div class="col-lg-3 col-sm-6">
                    <div class="item">
                        <div class="menu-container">
                            <button class="menu-toggle">⋮</button>
                            <div class="menu-options">
                                <a href="{{ route('admin.programs.show', $program->id) }}">View</a>
                                <a href="{{ route('admin.programs.edit', $program->id) }}">Edit</a>
                                <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this program?')">Delete</button>
                                </form>
                            </div>
                        </div>
                        <img src="{{ asset($program->img ?? 'assets/images/popular-01.jpg') }}" alt="{{ $program->name }}">
                        <h4 class="game-title">{{ $program->name }}</h4>
                        <p class="game-desc">{{ Str::limit($program->description, 80) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <button class="fab" onclick="window.location='{{ route('admin.programs.create') }}'">
        <i class="ion-plus-round"></i>
    </button>

    @section('scripts')
        <script>
            document.querySelectorAll('.menu-toggle').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.stopPropagation();
                    const menu = this.closest('.menu-container');
                    document.querySelectorAll('.menu-container').forEach(m => {
                        if (m !== menu) m.classList.remove('active');
                    });
                    menu.classList.toggle('active');
                });
            });

            document.addEventListener('click', () => {
                document.querySelectorAll('.menu-container').forEach(m => m.classList.remove('active'));
            });
        </script>
    @endsection
</x-app-layout>
