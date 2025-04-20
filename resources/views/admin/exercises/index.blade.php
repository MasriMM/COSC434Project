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
    margin: 0 auto; /* ✅ This centers the image */
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
            .main-border-button a,
            .header-area .main-nav .menu-trigger span,
            .header-area .main-nav .menu-trigger span:before,
            .header-area .main-nav .menu-trigger span:after,
            .heading-section h4 {
                background-color: #ff1e1e !important;
                color: #fff !important;
                border-color: #ff1e1e !important;
            }
        
            .main-border-button a {
                color: #ffffff !important;
                border-color: #ff1e1e !important;
            }
        
            .main-border-button a:hover {
                background-color: #fff !important;
                color: #ff1e1e !important;
            }
        
            a:hover {
                color: #ff1e1e !important;
            }
        
            .gaming-library .item ul li h4 {
                color: #ff1e1e;
                font-size: 16px;
                font-weight: 600;
                text-transform: uppercase;
            }
        
            .main-button a:hover,
            .main-border-button a:hover {
                box-shadow: 0 0 10px #ff1e1e;
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
            .gaming-library .item ul li img.templatemo-item {
    display: block;
    
}

.gaming-library .item ul li {
    text-align: center;
}
.gaming-library .item ul {
    height: 270px; /* or whatever fixed height you want */
    display: flex;
    justify-content: center; /* vertical centering */
    align-items: center;     /* horizontal centering */
    padding: 0;
    margin: 0;
    list-style: none;
}

    </style>
        
    @endsection

    <div class="container py-5">
        <div class="row">
            
                <div class="page-content">

                    <div class="gaming-library">
                        <div class="col-lg-12 text-center mb-4">
                            <div class="heading-section">
                                <h4>Exercises</h4>
                            </div>
                        </div>

                        @foreach ($exercises as $exercise)
                            <div class="item">
                                <ul>
                                    <li style="">
                                        <img src="{{ asset($exercise->img ?? 'assets/images/workout-01.jpg') }}" alt="" class="templatemo-item" style="margin-top: ">
                                    </li>
                                    <li><h4>Name</h4><span>{{ $exercise->name }}</span></li>
                                    <li><h4>Date Added</h4><span>{{ $exercise->created_at->format('d/m/Y') }}</span></li>
                                    <li><h4>Difficulty</h4><span>{{ ucfirst($exercise->difficulty) }}</span></li>
                                    <li>
                                        <div class="button-group">
                                            <div class="main-border-button">
                                                <a href="{{ route('admin.exercises.show', $exercise->id) }}">View</a>
                                            </div>
                                            <div class="main-border-button">
                                                <a href="{{ route('admin.exercises.edit', $exercise->id) }}">Edit</a>
                                            </div>
                                           
                                        </div>
                                        
                                        
                                    </li>
                                </ul>
                            </div>
                        @endforeach

                        <div class="col-lg-12 mt-4 text-center">
                            <div class="main-button">
                                <a href="{{ route('admin.exercises.create') }}">Add New Exercise</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/isotope.min.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/owl-carousel.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/tabs.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/popup.js') }}"></script>
        <script src="{{ asset('js/admin-exersice/custom.js') }}"></script>
    @endsection
</x-app-layout>
