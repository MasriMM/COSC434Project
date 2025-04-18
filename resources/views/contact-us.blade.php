
@extends('layout')

@section('title', 'Contact Us')

@section('content')
<body>
    <link rel="stylesheet" href="contact.css">
<div class="isolate bg-zinc-900 bg-custom px-6 py-24 sm:py-32 lg:px-8 text-white">   
    <div class="form-container mx-auto mt-16 max-w-xl sm:mt-24">    
    <div class=" mx-auto max-w-2xl text-center">         
        <h2 class="text-4xl font-semibold tracking-tight text-white sm:text-5xl">Send us a message</h2>         
        <p class="mt-2 text-lg text-gray-300">We would love to hear from you!</p>     
    </div>   
    <form action="#" method="POST" class="mx-auto mt-2 max-w-xl sm:mt-20 p-0 rounded-lg shadow-lg">
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <!-- First Name Field -->
            <div class="group relative">
                <label for="first-name" class="block text-sm font-semibold text-white">First name</label>
                <div class="relative mt-2.5">
                    <input type="text" name="first-name" id="first-name"
                        class="block w-full rounded-md border border-gray-600 px-3.5 py-2 pr-10 text-white placeholder-gray-400 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-red-500 group-hover:scale-105"
                        placeholder="Enter your first name">
                    <i class="fa-solid fa-user absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-red-500 transition-all duration-300"></i>
                </div>
            </div>

            <!-- Last Name Field -->
            <div class="group relative">
                <label for="last-name" class="block text-sm font-semibold text-white">Last name</label>
                <div class="relative mt-2.5">
                    <input type="text" name="last-name" id="last-name"
                        class="block w-full rounded-md border border-gray-600 px-3.5 py-2 pr-10 text-white placeholder-gray-400 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-red-500 group-hover:scale-105"
                        placeholder="Enter your last name">
                    <i class="fa-solid fa-user absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-red-500 transition-all duration-300"></i>
                </div>
            </div>

            <!-- Email Field -->
            <div class="sm:col-span-2 group relative">
                <label for="email" class="block text-sm font-semibold text-white">Email</label>
                <div class="relative mt-2.5">
                    <input type="email" name="email" id="email"
                        class="block w-full rounded-md border border-gray-600 px-3.5 py-2 pr-10 text-white placeholder-gray-400 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-red-500 group-hover:scale-105"
                        placeholder="Enter your email address">
                    <i class="fa-solid fa-envelope absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-red-500 transition-all duration-300"></i>
                </div>
            </div>

            <!-- Subject Field -->
            <div class="sm:col-span-2 group relative">
                <label for="subject" class="block text-sm font-semibold text-white">Subject</label>
                <div class="relative mt-2.5">
                    <input type="text" name="subject" id="subject"
                        class="block w-full rounded-md border border-gray-600 px-3.5 py-2 pr-10 text-white placeholder-gray-400 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-red-500 group-hover:scale-105"
                        placeholder="Enter your subject">
                    <i class="fa-solid fa-pencil absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-red-500 transition-all duration-300"></i>
                </div>
            </div>

            <!-- Message Field -->
            <div class="sm:col-span-2 group relative">
                <label for="message" class="block text-sm font-semibold text-white">Message</label>
                <div class="relative mt-2.5">
                    <textarea name="message" id="message" rows="4"
                        class="block w-full rounded-md border border-gray-600 px-3.5 py-2 pr-10 text-white placeholder-gray-400 focus:ring-red-500 focus:border-red-500 transition-all duration-300 hover:border-red-500 group-hover:scale-105"
                        placeholder="Enter your feedback"></textarea>
                    <i class="fa-solid fa-comment-dots absolute right-3 bottom-3 text-gray-400 group-hover:text-red-500 transition-all duration-300"></i>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-10">
            <button type="submit"
                class="block w-full rounded-md bg-red-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-500 hover:scale-105 transition-all duration-300 focus:ring-2 focus:ring-red-600 focus:ring-offset-2">
                <i class="fa-solid fa-paper-plane mr-2"></i> Send Message
            </button>
        </div>
    </form>
    </div> 
</div>

<div>
    <section class="py-2 bg-zinc-900 text-white">
        <div class="container mx-auto px-6 lg:px-20">
            <h2 class="text-3xl font-bold text-center mb-6 animate-fade-in">Our Contact Detail</h2>
            <p class="text-gray-300 text-center mb-10 animate-fade-in">Get in touch with us for inquiries, support, or collaboration.</p>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">

                <div class="flex flex-col items-center bg-zinc-700 p-6 rounded-xl shadow-lg transition-all duration-500 hover:scale-105 hover:shadow-xl animate-fade-in">
                    <div class="bg-red-600 p-4 rounded-full mb-4 animate-bounce-slow">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold">Gymcation</h3>
                    <p class="text-gray-300">Hamra, Beirut</p>
                </div>

                <div class="flex flex-col items-center bg-zinc-700 p-6 rounded-xl shadow-lg transition-all duration-500 hover:scale-105 hover:shadow-xl animate-fade-in">
                    <div class="bg-red-600 p-4 rounded-full mb-4 animate-bounce-slow">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold">Working Hours</h3>
                    <p class="text-gray-300">Mon-Sat: 09:00-11:00</p>
                    <p class="text-gray-300">Sunday: Closed</p>
                </div>

                <div class="flex flex-col items-center bg-zinc-700 p-6 rounded-xl shadow-lg transition-all duration-500 hover:scale-105 hover:shadow-xl animate-fade-in">
                    <div class="bg-red-600 p-4 rounded-full mb-4 animate-bounce-slow">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold">Call Us</h3>
                    <p class="text-gray-300">+961 81 069 285</p>
                    <p class="text-gray-300">+961 76 863 887</p>
                </div>

                <div class="flex flex-col items-center bg-zinc-700 p-6 rounded-xl shadow-lg transition-all duration-500 hover:scale-105 hover:shadow-xl animate-fade-in">
                    <div class="bg-red-600 p-4 rounded-full mb-4 animate-bounce-slow">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold">Email Us</h3>
                    <p class="text-gray-300">Fitnesstracker@gmail.com</p>
                    <p class="text-gray-300">Fitnessplanner@gmail.com</p>
                </div>
            </div>

     <div class="w-full h-[450px] mt-12">
        <iframe 
            class="w-full h-full"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3311.756241348304!2d35.47680457555354!3d33.89593117321621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f172b23035589%3A0xb1a9cdc8d5568820!2sFitness%20Zone%20-%20Hamra!5e0!3m2!1sen!2slb!4v1744986174900!5m2!1sen!2slb" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
</div>

    </section>
</div>


<div class="bg-zinc-900 px-6 py-24 sm:py-32 lg:px-8 text-white" id="contact-section">
    <div class="mx-auto max-w-2xl text-left">
        <h2 class="text-4xl font-extrabold tracking-tight sm:text-5xl text-white">Frequently Asked Questions</h2>
        <p class="mt-3 text-lg text-gray-300 text-center">Find answers to common questions below.</p>
    </div>

    <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="faq-item bg-zinc-800 p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:scale-105 transform">
            <button class="flex justify-between w-full text-lg font-semibold text-white hover:text-red-500 transition-all duration-300" onclick="toggleFAQ(this)">
                <span>What is your return policy?</span>
                <i class="fas fa-plus transition-transform duration-300"></i>
            </button>
            <div class="faq-answer max-h-0 overflow-hidden text-gray-300 opacity-0 transition-all duration-500 ease-in-out transform">
                <p class="mt-3">Our return policy allows you to return items within 30 days of purchase. The items must be unused and in their original packaging.</p>
            </div>
        </div>

        <div class="faq-item bg-zinc-800 p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:scale-105 transform">
            <button class="flex justify-between w-full text-lg font-semibold text-white hover:text-red-500 transition-all duration-300" onclick="toggleFAQ(this)">
                <span>How can I track my order?</span>
                <i class="fas fa-plus transition-transform duration-300"></i>
            </button>
            <div class="faq-answer max-h-0 overflow-hidden text-gray-300 opacity-0 transition-all duration-500 ease-in-out transform">
                <p class="mt-3">You can track your order by logging into your account and visiting the "Order History" section. You will find the tracking number there.</p>
            </div>
        </div>

        <div class="faq-item bg-zinc-800 p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:scale-105 transform">
            <button class="flex justify-between w-full text-lg font-semibold text-white hover:text-red-500 transition-all duration-300" onclick="toggleFAQ(this)">
                <span>How do I create a workout plan?</span>
                <i class="fas fa-plus transition-transform duration-300"></i>
            </button>
            <div class="faq-answer max-h-0 overflow-hidden text-gray-300 opacity-0 transition-all duration-500 ease-in-out transform">
                <p class="mt-3">You can create a custom workout plan by selecting your fitness goals (weight loss, strength training, etc.), preferred exercises, and available equipment.</p>
            </div>
        </div>

        <div class="faq-item bg-zinc-800 p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:scale-105 transform">
            <button class="flex justify-between w-full text-lg font-semibold text-white hover:text-red-500 transition-all duration-300" onclick="toggleFAQ(this)">
                <span>Can I use pre-made workout programs, or do I have to create my own?</span>
                <i class="fas fa-plus transition-transform duration-300"></i>
            </button>
            <div class="faq-answer max-h-0 overflow-hidden text-gray-300 opacity-0 transition-all duration-500 ease-in-out transform">
                <p class="mt-3">You can choose from our pre-made workout programs, which contain structured exercises designed by fitness experts.</p>
            </div>
        </div>

        <div class="faq-item bg-zinc-800 p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:scale-105 transform">
            <button class="flex justify-between w-full text-lg font-semibold text-white hover:text-red-500 transition-all duration-300" onclick="toggleFAQ(this)">
                <span>How do I create my own workout?</span>
                <i class="fas fa-plus transition-transform duration-300"></i>
            </button>
            <div class="faq-answer max-h-0 overflow-hidden text-gray-300 opacity-0 transition-all duration-500 ease-in-out transform">
                <p class="mt-3">Creating a custom workout is easy! Simply go to the "Create Workout" section, choose exercises from our extensive database, set reps, sets, rest periods, and save your workout.</p>
            </div>
        </div>

        <div class="faq-item bg-zinc-800 p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-2xl hover:scale-105 transform">
            <button class="flex justify-between w-full text-lg font-semibold text-white hover:text-red-500 transition-all duration-300" onclick="toggleFAQ(this)">
                <span>Can I save multiple workout plans?</span>
                <i class="fas fa-plus transition-transform duration-300"></i>
            </button>
            <div class="faq-answer max-h-0 overflow-hidden text-gray-300 opacity-0 transition-all duration-500 ease-in-out transform">
                <p class="mt-3">Yes, you can save multiple workout plans and switch between them anytime.</p>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/contact.js') }}"></script>
@endsection