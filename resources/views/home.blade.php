@extends('layout')

@section('title', 'Home')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
<link rel="stylesheet" href="{{ asset('css/home/animate.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/home/style.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
<link rel="stylesheet" href="{{ asset('css/home/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/aos.css') }}">
<link rel="stylesheet" href="{{ asset('css/home/tooplate-gymso-style.css') }}">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
@endsection

@section('content')
  <!-- HERO -->
  <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

    <div class="bg-overlay"></div>

       <div class="container">
            <div class="row">

                 <div class="col-lg-8 col-md-10 mx-auto col-12">
                      <div class="hero-text mt-5 text-center">

                            <h6 data-aos="fade-up" data-aos-delay="300">A fresh approach to achieving a healthier, stronger you!</h6>

                            <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">with FitForg once you see rseults it becomes an addiction</h1>

                            <a href="#feature" class="btn custom-btn bordered mt-3" style="background-color: red; border-color: red; color: white;" data-aos="fade-up" data-aos-delay="600">
                                Get started
                              </a>
                              
                            
                           
                      </div>
                 </div>

            </div>
       </div>
</section>


<section class="feature" id="feature">
<div class="container">
    <div class="row">

        <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
            <h2 class="mb-3 text-white" data-aos="fade-up">New to the FitFog?</h2>


        </div>

        <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
             <div class="about-working-hours">
                  <div>

                      <h2 class="mb-4 text-white" data-aos="fade-up" data-aos-delay="500">Our Program Targets: </h2>

                      <strong class="d-block" data-aos="fade-up" data-aos-delay="600">Beginners looking to start their fitness journey</strong>

                      <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Individuals aiming for weight loss and muscle toning</strong>

                      <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Busy professionals needing flexible workout plans</strong>


                       </div>
                  </div>
             </div>
        </div>

    </div>
</div>
</section>


<!-------About End------->

<section class="about section-padding prelative" data-scroll-index='1' id="#about">
<div class="container">
<div class="row">
<div class="col-md-12">
  <div class="sectioner-header text-center">
    <h3>About</h3>
    <span class="line"></span>
    <p>"Achieve your fitness goals with our personalized training platform! Schedule a session with one of our expert coaches and customize your own training program to match your unique needs and lifestyle."</p>
  </div>
  <div class="section-content text-center">
    <div class="row">
      <div class="col-md-4">
        <div class="icon-box wow fadeInUp" data-wow-delay="0.2s"> <i class="fa fa-heartbeat" aria-hidden="true"></i>
          <h5>Services </h5>
          <p>Explore personal training and custom workout plans for all fitness levels.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="icon-box wow fadeInUp" data-wow-delay="0.4s"> <i class="fa fa-users" aria-hidden="true"></i>
            <h5>Book a Session</h5>
            <p>Schedule your workouts anytime to match your routine.</p>
            </div>
      </div>
      <div class="col-md-4">
        <div class="icon-box wow fadeInUp" data-wow-delay="0.6s"> <i class="fa fa-bolt" aria-hidden="true"></i>
            <h5>Plans & Memberships</h5>
            <p>Select the perfect program tailored to your lifestyle and fitness objectives.</p>
            
          </p>
        </div>
      </div>
    </div>
    <a href="/about" class="about-btn">Learn More</a> </div>
</div>
</div>
</div>
</section>
<!-------About End-------> 

<!-------Video Start------->
<section class="video-section prelative text-center white">
<div class="section-padding video-overlay">
<div class="container">
<h3>Watch Now</h3>
<i class="fa fa-play" id="video-icon" aria-hidden="true"></i>
<div class="video-popup">
  <div class="video-src">
    <div class="iframe-src">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/_JRefJH6N00" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
</div>
</div>
</div>
</section>
<!-------Video End-------> 

<!-------Features Start------->
<section class="feature section-padding" data-scroll-index='2'>
<div class="container">
<div class="row">
<div class="col-md-12">
  <div class="sectioner-header text-center">
    <h3 style="color: white">Features</h3>
    <span class="line"></span>
    <p style="color: white">Our platform offers personalized training plans, expert coaching, and flexible scheduling to fit your lifestyle. Track your progress, access workout guides, and enjoy a seamless user experience with secure payments and mobile-friendly access.</p>
  </div>
  <div class="section-content text-center">
    <div class="row">
      <div class="col-md-4 col-sm-12">
        <div class="media single-feature wow fadeInUp" data-wow-delay="0.2s">
          <div class="media-body text-right media-right-margin">
            <h5 style="color: white">Personalized Training Plans</h5>
            <p style="color: white">Customize workout programs based on your fitness level, goals, and schedule.</p>
          </div>
          <div class="media-right icon-border"> <span class="fa fa-bolt" aria-hidden="true"></span> </div>
        </div>
        <div class="media single-feature wow fadeInUp" data-wow-delay="0.4s">
          <div class="media-body text-right media-right-margin">
            <h5 style="color: white">Premium Supplements</h5>
            <p style="color: white">Support your fitness journey with top-quality supplements for energy, recovery, and performance.</p>
            
          </div>
          <div class="media-right icon-border"> <span class="fa fa-battery-full" aria-hidden="true"></span> </div>
        </div>
        <div class="media single-feature wow fadeInUp" data-wow-delay="0.6s">
          <div class="media-body text-right media-right-margin">
            <h5 style="color: white">Build Your Own Program</h5>
            <p style="color: white">Customize your training plan to match your goals, schedule, and fitness level.</p>
            
          </div>
          <div class="media-right icon-border"> <span class="fa fa-wifi" aria-hidden="true"></span> </div>
        </div>
      </div>
      <div class="col-md-4 d-none d-md-block d-lg-block">
        <div class="feature-mobile"> <img src="{{asset('imgs/home/3d-gym-equipment.png')}}" class="img-fluid wow fadeInUp"/> </div>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="media single-feature wow fadeInUp" data-wow-delay="0.2s">
          <div class="media-left icon-border media-right-margin"> <span class="fa fa-check-double" aria-hidden="true"></span> </div>
          <div class="media-body text-left">
            <h5 style="color: white">Mobile-Friendly & User-Friendly Interface</h5>
            <p style="color: white">Train anytime, anywhere with a responsive and easy-to-navigate website.</p>
          </div>
        </div>
        <div class="media single-feature wow fadeInUp" data-wow-delay="0.4s">
          <div class="media-left icon-border media-right-margin"> <span class="fa fa-dollar-sign" aria-hidden="true"></span> </div>
          <div class="media-body text-left">
            <h5 style="color: white">Nutrition & Wellness Guidance</h5>
            <p style="color: white">Get meal plans and diet tips to complement your training.</p>
          </div>
        </div>
        <div class="media single-feature wow fadeInUp" data-wow-delay="0.6s">
          <div class="media-left icon-border media-right-margin"> <span class="fa fa-hdd" aria-hidden="true"></span> </div>
          <div class="media-body text-left">
            <h5 style="color: white">Community & Support</h5>
            <p style="color: white">Join a community of fitness enthusiasts for motivation and support.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</section>


@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script src="{{ asset('js/home/scrollIt.min.js') }}"></script>
<script src="{{ asset('js/home/wow.min.js') }}"></script>
<script src="{{ asset('js/home/homePage.js') }}"></script>
<script src="{{ asset('js/home/jquery.min.js') }}"></script>
<script src="{{ asset('js/home/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/home/aos.js') }}"></script>
<script src="{{ asset('js/home/smoothscroll.js') }}"></script>
<script src="{{ asset('js/home/custom.js') }}"></script>
@endsection
