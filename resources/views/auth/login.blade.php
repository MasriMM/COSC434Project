<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/login-signin/sign-log.css') }}" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container background">
      <div class="forms-container">
        <div class="signin-signup">

          <!-- Laravel Login Form -->
          <form method="POST" action="{{ route('login') }}" class="sign-in-form">
            @csrf
            <h2 class="title">Sign in</h2>

            <!-- Email -->
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus autocomplete="username" />
            </div>
            @error('email')
              <div class="text-danger">{{ $message }}</div>
            @enderror

            <!-- Password -->
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="password" type="password" name="password" required placeholder="Password" autocomplete="current-password" />
            </div>
            @error('password')
              <div class="text-danger">{{ $message }}</div>
            @enderror

            <!-- Remember Me -->
            <div class="block mt-4">
              <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600" style="color: aliceblue">{{ __('Remember me') }}</span>
              </label>
            </div>

            <!-- Forgot Password -->
            <div class="flex items-center justify-end mt-4">
              @if (Route::has('password.request'))
                <a class="underline text-sm text-white hover:text-gray-200" href="{{ route('password.request') }}">
                  {{ __('Forgot your password?') }}
                </a>
              @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn">Login</button>

            <!-- Social Login (Optional) -->
            
          </form>

          <!-- Dummy Sign-up Form -->
          
        </div>
      </div>

      <!-- Panels -->
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>He is a dedicated gym member who stays committed to his health and fitness goals.</p>
          </div>
          <img src="{{ asset('imgs/login-signin/undraw_fitness-stats_uk0g.svg') }}" class="image" alt="" />
        </div>
        
      </div>
    </div>

    <!-- JavaScript -->
    <script>
      document.getElementById("sign-up-btn").addEventListener("click", function () {
        window.location.href = "{{ route('register') }}";
      });
    </script>
  </body>
</html>
