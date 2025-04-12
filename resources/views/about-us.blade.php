@extends('layout')

@section('title', 'About us') 

@section('content') 
<!-- hero section -->
<div style="background-image: url('{{ asset('imgs/aboutUs/hero.png') }}');" class="w-full mx-auto bg-cover bg-center bg-no-repeat p-6 h-[550px] flex items-center justify-center relative">
  <div class="absolute inset-0 bg-black opacity-70 z-0"></div>
  <div class="w-7/10 relative z-10">
    <h1 class="text-5xl font-semibold tracking-tight text-balance text-zinc-50 sm:text-7xl">
      Every Rep <span class="text-red-800">Counts.</span> Every Step <span class="text-red-800">Matters.</span>
    </h1>
    <p class="mt-8 text-lg font-medium text-pretty text-zinc-50 sm:text-xl/8">
      Your progress, your way—track, plan, and stay on top of your fitness game.
      <span class="text-red-400">Our Mission</span> is to provide you with the tools to build strength, stay active, and crush your fitness goals.
    </p>
  </div>
</div>

<!-- Guide -->
<div class="relative isolate bg-zinc-950 px-4 py-10 sm:py-18 lg:px-8">
    <div class="absolute inset-0 -z-10 transform-gpu overflow-hidden blur-3xl opacity-30">
    <div class="w-full h-full bg-gradient-to-tr from-[#f98ab9] to-[#f04e4e]"
        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
    </div>
    </div>


  <div class="mx-auto max-w-4xl text-center">
    <h2 class="text-5xl font-semibold tracking-tight text-balance text-red-700 sm:text-6xl">How <span class="text-zinc-50">FitForge</span> Works</h2>
    <p class="mx-auto mt-6 max-w-2xl text-center text-lg text-pretty text-zinc-50 sm:text-xl/8">
      We make your fitness journey simple, smart, and motivating from the start. Here's how:
    </p>
  </div>

  <div class="mx-auto mt-10 grid max-w-4xl grid-cols-1 gap-y-12 sm:grid-cols-3 text-center">
    <div class="p-4">
      <div class="mb-2 flex items-center justify-center">
        <div class="w-12 h-12 rounded-full bg-red-800 p-3 text-white text-xl font-bold leading-none">1</div>
      </div>
      <h3 class="text-xl font-semibold text-red-400">Create Your Profile</h3>
      <p class="mt-2 text-sm text-zinc-400">Sign up in seconds and input your height, weight, and personal fitness goals. This helps us tailor the platform to your needs and objectives.</p>
    </div>
    <div class="p-4">
      <div class="mb-2 flex items-center justify-center">
        <div class="w-12 h-12 rounded-full bg-red-800 p-3 text-white text-xl font-bold leading-none">2</div>
      </div>
      <h3 class="text-xl font-semibold text-red-400">Find Your Program</h3>
      <p class="mt-2 text-sm text-zinc-400">Browse our library of expert-designed workout programs or build your own routine based on your preferences.</p>
    </div>
    <div class="p-4">
      <div class="mb-2 flex items-center justify-center">
        <div class="w-12 h-12 rounded-full bg-red-800 p-3 text-white text-xl font-bold leading-none">3</div>
      </div>
      <h3 class="text-xl font-semibold text-red-400">Shop Supplements</h3>
      <p class="mt-2 text-sm text-zinc-400">Visit our curated supplement store and find products that support muscle growth, recovery, energy, and overall wellness—perfectly matched to your training goals.</p>
    </div>
  </div>
</div>

<!-- why choose us (services provided)-->
<div class="w-full bg-zinc-950 py-6">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-4xl font-semibold tracking-tight text-pretty text-zinc-50 sm:text-5xl">Why Choose <span class="text-red-800">Us</span></h2>
    </div>
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-10 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-2">
      <article class="group flex max-w-xl flex-col items-start justify-between">
        <div class="group relative border-2 p-3 rounded-lg border-red-200 h-[180px] transition-transform duration-300 hover:-translate-y-2 group-hover:border-red-400">
          <div class="flex items-center gap-x-6">
            <img class="size-17 w-18 h-18" src="imgs/aboutUs/service1.png" alt="">
            <div>
              <h3 class="text-lg/6 font-semibold text-zinc-500 group-hover:text-red-400">
                <span class="absolute inset-0"></span>
                Various Workout Plans
              </h3>
            </div>
          </div>
        <p class="mt-1 line-clamp-3 text-sm/6 text-zinc-50">We offer tailored workout programs that cover different individual fitness goals, whether it's weight loss, muscle gain, or overall fitness improvement.</p>
        </div>
      </article>
      <article class="group flex max-w-xl flex-col items-start justify-between">
        <div class="group relative border-2 p-3 rounded-lg border-red-200 h-[180px] transition-transform duration-300 hover:-translate-y-2 group-hover:border-red-400">
          <div class="flex items-center gap-x-6">
            <img class="size-17 w-18 h-18" src="imgs/aboutUs/service2.png" alt="">
            <div>
              <h3 class="text-lg/6 font-semibold text-zinc-500 group-hover:text-red-400">
                <span class="absolute inset-0"></span>
                Flexible Membership Options
              </h3>
            </div>
          </div>
        <p class="mt-1 line-clamp-3 text-sm/6 text-zinc-50">FitForge offers flexible membership plans to suit your fitness journey, whether you choose our Free Plan for essential tracking or our Pro Plan for AI-powered workouts and advanced analytics. </p>
        </div>
      </article>
      <article class=" group flex max-w-xl flex-col items-start justify-between">
        <div class="group relative border-2 p-3 rounded-lg border-red-200 h-[180px] transition-transform duration-300 hover:-translate-y-2 group-hover:border-red-400">
          <div class="flex items-center gap-x-6">
            <img class="size-17 w-18 h-18" src="imgs/aboutUs/service3.png" alt="">
            <div>
              <h3 class="text-lg/6 font-semibold text-zinc-500 group-hover:text-red-400">
                <span class="absolute inset-0"></span>
                24/7 Access
              </h3>
            </div>
          </div>
        <p class="mt-1 line-clamp-3 text-sm/6 text-zinc-50">Our Platform is accessible 24/7, giving you the flexibility to work out whenever you want.</p>
        </div>
      </article>
      <article class="group flex max-w-xl flex-col items-start justify-between">
        <div class="group relative border-2 p-3 rounded-lg border-red-200 h-[180px] transition-transform duration-300 hover:-translate-y-2 group-hover:border-red-400">
          <div class="flex items-center gap-x-6">
            <img class="size-17 w-18 h-18" src="imgs/aboutUs/service4.png" alt="">
            <div>
              <h3 class="text-lg/6 font-semibold text-zinc-500 group-hover:text-red-400">
                <span class="absolute inset-0"></span>
                Wellness Programs
              </h3>
            </div>
          </div>
        <p class="mt-1 line-clamp-3 text-sm/6 text-zinc-50">We offer additional services like yoga, mindfulness, recovery sessions, or injury prevention tips to keep you engaged in all aspects of your health.</p>
        </div>
      </article>
    </div>
  </div>
</div>

<!-- our team -->
<div class="relative bg-zinc-950 py-20 px-6 overflow-hidden">
  <div class="absolute inset-0 z-0 bg-gradient-to-br from-red-900/10 via-transparent to-zinc-950/40"></div>
  <div class="absolute bottom-22 right-0 w-[300px] h-[300px] bg-red-700/20 blur-[120px] rounded-full z-0"></div>
    <!-- your team section content -->
    <div class="max-w-xl">
            <h2 class="text-3xl font-semibold tracking-tight text-pretty text-zinc-50 sm:text-4xl"><span class="text-red-800">Meat</span> our team</h2>
            <p class="mt-6 text-lg/8 text-zinc-400">Meet the passionate fitness enthusiasts and tech experts behind FitForge, dedicated to helping you achieve your health and wellness goals!</p>
        </div>
    <ul role="list" class="grid gap-x-15 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
      <li>
        <div class="flex items-center gap-x-6">
          <img class="size-16" src="/imgs/aboutUs/male_team.png" alt="">
          <div>
            <h3 class="text-base/7 font-semibold tracking-tight text-zinc-300">Mohammad Marakebji</h3>
            <p class="text-sm/6 font-semibold text-red-400/70">Founder & CEO</p>
          </div>
        </div>
      </li>
      <li>
        <div class="flex items-center gap-x-6">
          <img class="size-16" src="/imgs/aboutUs/female_team.png" alt="">
          <div>
            <h3 class="text-base/7 font-semibold tracking-tight text-zinc-300">Mira Masri</h3>
            <p class="text-sm/6 font-semibold text-red-400/70">Lead Developer</p>
          </div>
        </div>
      </li>
      <li>
        <div class="flex items-center gap-x-6">
          <img class="size-16" src="/imgs/aboutUs/female_team.png" alt="">
          <div>
            <h3 class="text-base/7 font-semibold tracking-tight text-zinc-300">Kinda Seifedine</h3>
            <p class="text-sm/6 font-semibold text-red-400/70">Fitness Expert</p>
          </div>
        </div>
      </li>
      <li>
        <div class="flex items-center gap-x-6">
          <img class="size-16" src="/imgs/aboutUs/male_team.png" alt="">
          <div>
            <h3 class="text-base/7 font-semibold tracking-tight text-zinc-300">Mahmoud Batech</h3>
            <p class="text-sm/6 font-semibold text-red-400/70">UI/UX Designer</p>
          </div>
        </div>
      </li>
    </ul>
 
</div>
@endsection