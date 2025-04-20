@extends('layout')

@section('title', 'Programs')

@section('styles')
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

<style>
    .classes-box {
        background-color: #1a1a1a;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.6);
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: all 0.3s ease-in-out;
        position: relative;
        border: 2px solid transparent;
    }

    .classes-box:hover {
        transform: translateY(-8px);
        border-color: #c53423;
        box-shadow: 0 0 20px rgba(197, 52, 35, 0.4);
    }

    .classes-box img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: 0.3s ease-in-out;
    }

    .classes-box:hover img {
        filter: brightness(1.05);
        transform: scale(1.02);
    }

    .classes-box .content {
        padding: 20px;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .classes-box .heading {
        font-size: 1.25rem;
        font-weight: 600;
        color: #ffffff;
        margin-bottom: 10px;
    }

    .classes-box p {
        color: #cccccc;
        font-size: 0.95rem;
        flex-grow: 1;
        margin-bottom: 15px;
    }

    .classes-box a {
        color: #ff4e3d;
        font-weight: 600;
        text-decoration: none;
        font-size: 0.95rem;
        transition: 0.3s;
    }

    .classes-box a i {
        margin-left: 8px;
        transition: 0.3s;
    }

    .classes-box:hover a i {
        transform: translateX(4px);
    }

    .fav-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: #fff;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        transition: transform 0.3s ease;
        z-index: 2;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .fav-btn i {
        color: #bbb;
        font-size: 18px;
        transition: color 0.3s ease;
    }

    .fav-btn.active i {
        color: #c53423;
        animation: pulse 0.4s ease;
    }

    .fav-btn:hover {
        transform: scale(1.1);
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.3); }
        100% { transform: scale(1); }
    }
</style>
@endsection

@section('content')
<section>
    <div class="max-w-7xl mx-auto px-5 py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($programs as $program)
            <div class="classes-box">
                
                <img src="{{ asset($program->img ?? 'imgs/default.png') }}" alt="{{ $program->name }}">
                <div class="content">
                    <h4 class="heading">{{ $program->name }}</h4>
                    <p>{{ Str::limit($program->description, 100) }}</p>
                    <a href="{{ route('program.show', $program->id) }}">
                        Read More <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- Floating Add Button -->
<a href="{{ route('program.create') }}"
   class="fixed bottom-6 right-6 z-50 bg-red-600 hover:bg-red-500 text-white px-5 py-3 rounded-full shadow-lg text-sm font-semibold flex items-center gap-2 transition">
    <i class="fas fa-user-plus"></i> Add Program
</a>
@endsection

@section('scripts')
<script>
    function toggleFavorite(button) {
        button.classList.toggle('active');
    }
</script>
@endsection
