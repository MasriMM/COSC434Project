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
            .button-group {
                display: flex;
                justify-content: center;
                gap: 10px;
                flex-wrap: wrap;
                margin-top: 10px;
            }

            .gaming-library .item ul li {
                margin-top: 8px;
                padding: 0;
            }

            .button-group .main-border-button {
                padding: 4px 10px;
                font-size: 12px;
                white-space: nowrap;
            }

            .button-group form {
                display: inline;
            }

            .templatemo-item {
                width: 150px;
                border-radius: 23px;
                border: 2px solid #ff1e1e;
                display: block;
                margin: 0 auto;
            }

            body {
                background-color: #27292a !important;
            }

            .page-content {
                padding: 40px 30px;
                background-color: #1a1a1a;
                border-radius: 15px;
                box-shadow: 0 0 10px rgba(255, 30, 30, 0.15);
            }

            .main-button a,
            .main-border-button a {
                background-color: #ff1e1e !important;
                color: #fff !important;
                border-color: #ff1e1e !important;
            }

            .main-border-button a:hover {
                background-color: #fff !important;
                color: #ff1e1e !important;
                box-shadow: 0 0 10px #ff1e1e;
            }

            .gaming-library .item ul li h4 {
                color: #ff1e1e;
                font-size: 16px;
                font-weight: 600;
                text-transform: uppercase;
            }

            .gaming-library .item {
                background-color: #1e1e1e;
                border-radius: 12px;
                padding: 20px;
                margin-bottom: 20px;
                border: 1px solid #ff1e1e;
                box-shadow: 0 0 5px rgba(255, 30, 30, 0.2);
                transition: all 0.3s ease-in-out;
            }

            .gaming-library .item:hover {
                transform: translateY(-5px);
                box-shadow: 0 0 20px rgba(255, 30, 30, 0.4);
            }

            .gaming-library .item ul li {
                text-align: center;
            }

            .gaming-library .item ul {
                height: 270px;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0;
                margin: 0;
                list-style: none;
            }

            @media (max-width: 750px) {
                .page-content {
                    padding: 20px 15px;
                }

                .gaming-library .item {
                    margin-bottom: 30px;
                    padding: 15px;
                    border-radius: 10px;
                    box-shadow: 0 0 8px rgba(255, 30, 30, 0.25);
                }

                .gaming-library .item ul {
                    flex-direction: column;
                    height: auto;
                }

                .gaming-library .item ul li {
                    width: 100%;
                    margin-bottom: 12px;
                }

                .gaming-library .item ul li h4 {
                    font-size: 14px;
                }

                .templatemo-item {
                    width: 100px;
                    height: auto;
                }

                .button-group {
                    flex-direction: column;
                    gap: 6px;
                }

                .button-group .main-border-button {
                    width: 100%;
                    text-align: center;
                }

                .main-button a {
                    font-size: 14px;
                    padding: 10px 18px;
                }

                .heading-section h4 {
                    font-size: 22px;
                }
            }

            /* Scroll Button Style */
            #scrollToBottomBtn {
                position: fixed;
                bottom: 40px;
                right: 30px;
                background-color: #ff1e1e;
                color: white;
                border: none;
                padding: 12px 18px;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                cursor: pointer;
                z-index: 999;
                display: none;
            }
        </style>
    @endsection

    <div class="container py-5">
        <div class="row">
            <div class="page-content">
                <div class="gaming-library">
                    <div class="col-lg-12 text-center mb-4">
                        <div class="heading-section">
                            <h4 style="color: #ff1e1e">Exercises</h4>
                        </div>

                        <!-- Search Bar -->
                        <form action="{{ route('admin.exercises.index') }}" method="GET" class="d-flex justify-content-center mt-3">
                            <input type="text" name="search" class="form-control w-50" placeholder="Search exercises..." value="{{ request('search') }}">
                            <button type="submit" class="btn ms-2" style="background-color: #ff0000; color: white;">Search</button>

                        </form>
                    </div>

                    @if($exercises->isEmpty())
                        <div class="text-center text-white mt-4">
                            <h5>No exercises found for your search.</h5>
                        </div>
                    @endif

                    <div id="exercise-list">
                        @include('admin.exercises.partials.exercise-list')
                    </div>

                    <div class="col-lg-12 mt-4 text-center">
                        <div class="main-button">
                            <a href="{{ route('admin.exercises.create') }}">Add New Exercise</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Bottom Button -->
    <button id="scrollToBottomBtn">Scroll to Bottom</button>

    @section('scripts')
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/isotope.min.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/owl-carousel.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/tabs.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/popup.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/custom.js') }}"></script>

        <script>
            document.getElementById("scrollToBottomBtn").addEventListener("click", function () {
                window.scrollTo({
                    top: document.body.scrollHeight,
                    behavior: "smooth"
                });
            });

            window.addEventListener("scroll", function () {
                const btn = document.getElementById("scrollToBottomBtn");
                if (window.scrollY > 200) {
                    btn.style.display = "block";
                } else {
                    btn.style.display = "none";
                }
            });

            $(document).ready(function () {
        $('input[name="search"]').on('keyup', function () {
            let query = $(this).val();

            $.ajax({
                url: "{{ route('admin.exercises.index') }}",
                type: "GET",
                data: { search: query },
                success: function (data) {
                    $('#exercise-list').html(data);
                },
                error: function () {
                    alert('Something went wrong. Please try again.');
                }
            });
        });
    });
        </script>
    @endsection
</x-app-layout>
