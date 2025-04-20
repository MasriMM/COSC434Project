@extends('layout')

@section('title', $program->name)

@section('styles')
<!-- Google Fonts & Bootstrap -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

<!-- Plugin Styles -->
<link rel="stylesheet" href="{{ asset('css/program-detail/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/program-detail/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/program-detail/venobox.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/program-detail/styles.css') }}">

<!-- Custom Inline Styles -->
<style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Inter', sans-serif;
            }
            .checkbox-wrapper-56 .container input:focus,
.checkbox-wrapper-56 .container input:active {
    outline: none;
    box-shadow: none;
}

.checkbox-wrapper-56 .container input:checked {
    background-color: #1a1a1a;
    border-color: #e31515;
    appearance: none; /* For cross-browser uniformity */
}



            body {
                background: linear-gradient(135deg, #0e0e0e, #1a0000, #330000);
                background-size: 200% 200%;
                animation: gradientShift 15s ease infinite;
                color: #fff;
            }

            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            .class-details-section {
                padding: 60px 0;
            }
            .right-content {
    box-shadow: 0 0 25px rgba(255, 255, 255, 0.25), 0 0 60px rgba(255, 255, 255, 0.15);
    padding: 33px 30px;
    border-radius: 20px;
    background-color: #1a1a1a; /* optional for better contrast */
    transition: box-shadow 0.3s ease-in-out;
}

            .left-content{
                background-color: #1a1a1a;
                padding: 20px;
                border-radius: 12px;
                position: relative;
                z-index: 1;
                box-shadow:
                    0 0 20px rgba(255, 255, 255, 0.2),
                    0 0 40px rgba(255, 255, 255, 0.15),
                    0 0 60px rgba(255, 255, 255, 0.1);
                margin-bottom: 30px;
                transition: box-shadow 0.3s ease;
            }

            .class-image {
                width: 100%;
                height: auto;
                border-radius: 12px;
                margin-bottom: 20px;
                border: 2px solid #e31515;
            }

            .class-meta .item {
                display: inline-block;
                margin-right: 15px;
                color: #fff;
            }

            .class-meta .heading {
                color: #e31515;
                font-weight: 600;
            }

            .main-separetor {
                height: 2px;
                background-color: #e31515;
                margin: 30px 0;
            }

            .title {
                color: #e31515;
                font-weight: 700;
                margin-bottom: 15px;
            }

            .discription {
                color: #ccc;
                line-height: 1.6;
            }

            blockquote {
                color: #e0e0e0;
                font-style: italic;
                border-left: 4px solid #e31515;
                padding-left: 15px;
            }

            .text-img img {
                width: 100%;
                border-radius: 8px;
                margin-top: 10px;
            }

            /* Table Styling */
            .table {
                width: 100%;
                margin-top: 20px;
                background-color: #181818;
                color: #fff;
                border-collapse: separate;
                border-spacing: 0;
                border: 1px solid #e31515;
                border-radius: 10px;
                overflow: hidden;
            }

            .table thead {
                background-color: #2a2a2a;
                border-bottom: 2px solid #e31515;
            }

            .table thead th {
                color: #e31515;
                font-weight: 600;
                padding: 12px;
                text-align: center;
                border-right: 1px solid #333;
            }

            .table thead th:last-child {
                border-right: none;
            }

            .table tbody tr {
                transition: background-color 0.3s ease;
            }

            .table tbody tr:hover {
                background-color: rgba(227, 21, 21, 0.1);
            }

            .table tbody td {
                padding: 10px 15px;
                
                text-align: center;
                vertical-align: middle;
                font-size: 14px;
                color: #000000;
            }

            .table img {
                border-radius: 8px;
                box-shadow: 0 0 8px rgba(255, 255, 255, 0.05);
            }

            /* 3D Card Effects */
            .card {
                position: relative;
                width: 250px;
                height: 300px;
                background: linear-gradient(145deg, #1a1a1a, #111);
                border: 2px solid white;
                border-radius: 16px;
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
                margin: auto;
                transition: all 0.5s ease-in-out;
                transform-style: preserve-3d;
                perspective: 1000px;
                box-shadow: 0 0 15px rgba(255, 255, 255, 0.05);
                animation: cardFadeIn 0.5s ease;
            }

            .card:hover {
                transform: rotateY(5deg) rotateX(5deg) scale(1.05);
                box-shadow: 0 0 25px #e31515, 0 0 35px #e31515;
                border: 2px solid #e31515;
            }

            .card::before {
                content: '';
                position: absolute;
                top: 0;
                left: -50%;
                width: 200%;
                height: 100%;
                background: linear-gradient(120deg, rgba(255,255,255,0.1) 0%, transparent 60%);
                transform: skewX(-20deg);
                pointer-events: none;
            }

            .card:hover::after {
                content: '';
                position: absolute;
                width: 120%;
                height: 120%;
                background: radial-gradient(circle, rgba(227,21,21,0.25) 0%, transparent 80%);
                animation: pulseGlow 1.5s infinite;
                z-index: 0;
                border-radius: 50%;
            }

            @keyframes cardFadeIn {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }

            @keyframes pulseGlow {
                0% { transform: scale(0.9); opacity: 0.6; }
                50% { transform: scale(1.1); opacity: 0.2; }
                100% { transform: scale(0.9); opacity: 0.6; }
            }

            .percent {
                position: relative;
                width: 150px;
                height: 150px;
                border-radius: 50%;
                box-shadow: inset 0 0 50px #000;
                background: #222;
            }

            .percent .num {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .percent .num h2 {
                color: #777;
                font-weight: 700;
                font-size: 40px;
                transition: 0.5s;
            }

            .card:hover .percent .num h2 {
                color: #fff;
                font-size: 60px;
            }

            .percent .num h2 span {
                color: #777;
                font-size: 24px;
                transition: 0.5s;
            }

            .card:hover .percent .num h2 span {
                color: #fff;
            }

            .text {
                color: #000000;
                margin-top: 20px;
                font-weight: 700;
                font-size: 18px;
                text-transform: uppercase;
                transition: 0.5s;
            }

            .card:hover .text {
                color: #fff;
            }

            svg {
                position: relative;
                width: 150px;
                height: 150px;
            }

            svg circle {
                fill: none;
                stroke: #191919;
                stroke-width: 10;
                stroke-linecap: round;
                transform: translate(5px, 5px);
            }

            svg circle:nth-child(2) {
                stroke: #ff0000;
                stroke-dasharray: 440;
                stroke-dashoffset: 440;
                transition: stroke-dashoffset 0.5s;
            }

            /* Checkbox */
            .checkbox-wrapper-56 .container {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .checkbox-wrapper-56 .container input {
                opacity: 1;
                -webkit-appearance: none;
                cursor: pointer;
                height: 50px;
                width: 50px;
                background: #1a1a1a;
                border: 4px solid #e31515;
                border-radius: 50%;
                transition: .5s;
                box-shadow: inset 0 0 10px #000;
            }

            .checkbox-wrapper-56 .container input:checked {
                box-shadow: 0 0 10px #e31515, inset 0 0 10px #e31515;
            }

            .col-lg-4 .right-content {
    box-shadow: 0 0 25px rgba(255, 255, 255, 0.25), 0 0 60px rgba(255, 255, 255, 0.15);
    padding: 33px 30px;
    border-radius: 20px;
    background-color: #1a1a1a; /* Optional for better contrast */
    transition: box-shadow 0.3s ease-in-out;
}


            .checkbox-wrapper-56 .container input:checked::after {
                border-color: #e31515;
            }
        </style>
@endsection

@section('content')
<section class="class-details-section">
    <div class="container">
        <div class="row">
            <!-- Left Section -->
            <div class="col-lg-8">
                <div class="left-content">
                    <img class="class-image" src="{{ asset('storage/' . $program->img) }}" alt="{{ $program->name }}">
                    <div class="class-meta">
                        <div class="item"><span class="heading">Level:</span><span class="data" style="color: white">{{ ucfirst($program->level) }}</span></div>
                        <span class="separetor"></span>
                        <div class="item"><span class="heading">Duration:</span><span class="data" style="color: white">{{ $program->duration }} mins</span></div>
                        <span class="separetor"></span>
                        <div class="item"><span class="heading">Sets:</span><span class="data" style="color: white">{{ $program->sets }} sets/exercise</span></div>
                    </div>

                    <div class="main-separetor"></div>
                    <h4 class="title">Program's Exercises:</h4>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Exercise</th>
                                <th>GIF</th>
                                <th>Description</th>
                                <th class="text-center">Track Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($program->exercises as $exercise)
                                <tr>
                                    <th>{{ $exercise->name }}</th>
                                    <td><img src="{{ asset($exercise->img ?? 'assets/images/workout-01.jpg') }}" alt="{{ $exercise->name }}" style="width: 100px;"></td>
                                    <td>{{ $exercise->description }}</td>
                                    <td class="text-center align-middle">
                                        <div class="checkbox-wrapper-56">
                                            <label class="container">
                                              <input type="checkbox" class="exercise-checkbox">
                                              <div class="checkmark"></div>
                                            </label>
                                          </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-box mt-4">
                        <blockquote style="border-left: 4px solid #e31515; padding-left: 15px; color: rgb(0, 0, 0);">"Success usually comes to those who are too busy to be looking for it."</blockquote>
                        <p class="mt-2">— Henry David Thoreau</p>
                        <div class="text-img mt-3">
                            <img src="{{ asset('imgs/class-details-bg.png') }}" alt="images">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="col-lg-4">
                <div class="right-content">
                    <h4 class="title">Program Description:</h4>
                    <p class="discription">{{ $program->description }}</p>
                </div>

                <div class="right-content mt-3">
                    <h4 class="title">Exercise Progress:</h4>
                    <div class="card">
                        <div class="box">
                            <div class="percent">
                                <svg>
                                    <circle cx="70" cy="70" r="70"></circle>
                                    <circle id="circleProgress" cx="70" cy="70" r="70"></circle>
                                </svg>
                                <div class="num">
                                    <h2 id="percentNumber">0<span>%</span></h2>
                                </div>
                            </div>
                            <h2 class="text" style="color: white">Progress</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@auth
    @if(!$program->is_public && $program->user_id === auth()->id())
        <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="mt-4" onsubmit="return confirm('Are you sure you want to delete this program?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100">
                <i class="fa fa-trash"></i> Delete Program
            </button>
        </form>
    @endif
@endauth

@endsection

@section('scripts')

@section('scripts')
<script>
   document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll('.exercise-checkbox');
    const progressText = document.getElementById('percentNumber');
    const progressCircle = document.getElementById('circleProgress');

    const radius = 70;
    const circumference = 2 * Math.PI * radius;

    progressCircle.style.strokeDasharray = circumference;
    progressCircle.style.strokeDashoffset = circumference;

    function updateProgress() {
        const total = checkboxes.length;
        const checked = Array.from(checkboxes).filter(cb => cb.checked).length;
        const percent = Math.round((checked / total) * 100);

        progressCircle.style.strokeDashoffset = circumference - (percent / 100) * circumference;
        progressText.innerHTML = `${percent}<span>%</span>`;
    }

    checkboxes.forEach(cb => cb.addEventListener('change', updateProgress));

    updateProgress(); // Initialize on load
});
</script>
@endsection


    

