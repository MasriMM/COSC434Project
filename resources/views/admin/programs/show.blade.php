<x-app-layout>
    @section('title', 'Program Details')

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

        <!-- Inline Styles (merged) -->
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Roboto', sans-serif;
            }
            
            .card {
                position: relative;
                width: 250px;
                height: 300px;
                background: linear-gradient(0deg, #1b1b1b, #222, #1b1b1b);
                border: 2px solid red;
                border-radius: 4px;
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
                transition: 0.5s;
                margin: auto;
            }
            .card:hover {
                transform: translateY(-10px);
                box-shadow: 0 0 15px red, 0 0 25px red;
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
                color: #777;
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
    .checkbox-wrapper-56 *,
    .checkbox-wrapper-56 ::after,
    .checkbox-wrapper-56 ::before {
      box-sizing: border-box;
    }
    
    .checkbox-wrapper-56 .container input {
      opacity: 1;
      -webkit-appearance: none;
      cursor: pointer;
      height: 50px;
      width: 50px;
      box-shadow: -10px -10px 15px rgba(255,255,255,0.5),
      10px 10px 15px rgba(0,0,70,0.12);
      border-radius: 50%;
      border: 8px solid #ececec;
      outline: none;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: .5s;
    }
    
    
    .checkbox-wrapper-56 .container {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .checkbox-wrapper-56 .container input::after {
      transition: .5s;
      font-family: monospace;
      content: '';
      color: #7a7a7a;
      font-size: 25px;
      left: 0.45em;
      top: 0.25em;
      width: 0.25em;
      height: 0.5em;
      border: solid #7a7a7a;
      border-width: 0 0.15em 0.15em 0;
      transform: rotate(45deg);
    }
    
    .checkbox-wrapper-56 .container input:checked {
      box-shadow: -10px -10px 15px rgba(255,255,255,0.5),
      10px 10px 15px rgba(70,70,70,0.12),
      inset -10px -10px 15px rgba(255,255,255,0.5),
      inset 10px 10px 15px rgba(70,70,70,0.12);
      transition: .5s;
    }
    
    .checkbox-wrapper-56 .container input:checked::after {
      transition: .5s;
      border: solid #e31515;
      border-width: 0 0.15em 0.15em 0;
      transform: rotate(45deg);
    }
    </style>
    @endsection

    <section class="class-details-section">
        <div class="container">
            <div class="row">
                <!-- Left Section -->
                <div class="col-lg-8">
                    <div class="left-content">
                        <img class="class-image" src="{{ asset('storage/' . $program->img) }}" alt="{{ $program->name }}">
                        <div class="class-meta">
                            <div class="item"><span class="heading">Level:</span><span class="data">{{ ucfirst($program->level) }}</span></div>
                            <span class="separetor"></span>
                            <div class="item"><span class="heading">Duration:</span><span class="data">{{ $program->duration }} mins</span></div>
                            <span class="separetor"></span>
                            <div class="item"><span class="heading">Sets:</span><span class="data">{{ $program->sets }} sets/exercise</span></div>
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
                            <blockquote style="border-left: 4px solid #e31515; padding-left: 15px;">"Success usually comes to those who are too busy to be looking for it."</blockquote>
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
                                <h2 class="text">Progress</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
</x-app-layout>
