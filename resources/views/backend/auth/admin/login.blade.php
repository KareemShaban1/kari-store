

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    @if (App::getLocale() == 'en')
    <link href="{{ URL::asset('backend/assets/css/auth.css') }}" rel="stylesheet">
    @else
        <link href="{{ URL::asset('backend/assets/css/auth_rtl.css') }}" rel="stylesheet">
    @endif
</head>
<body>



    <div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
    <form method="POST" action="{{ route('login') }}">
    @csrf
			<h1>Admin Sign In</h1>
			<div style="margin-top: 30px;">
            <x-auth.input-label for="email" :value="__('auth.Email')" />
            <x-auth.text-input id="email" class="block mt-1 w-full" type="text" {{-- name="{{config('fortify.username')}}"  --}} name="email"
                :value="old('email')" autofocus required autocomplete="username" />
            <x-auth.input-error :messages="$errors->get('email')" class="mt-2 text-left" />
            </div>
			<div style="margin-top: 30px;">
            <x-auth.input-label for="password" :value="__('auth.Password')" />

            <x-auth.text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-auth.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
			<!-- <a href="#">Forgot your password?</a> -->
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<!-- <button class="ghost" id="signUp">Sign Up</button> -->
			</div>
		</div>
	</div>
</div>


    <script>
//         const signUpButton = document.getElementById('signUp');
// const signInButton = document.getElementById('signIn');
// const container = document.getElementById('container');

// signUpButton.addEventListener('click', () => {
// 	container.classList.add("right-panel-active");
// });

// signInButton.addEventListener('click', () => {
// 	container.classList.remove("right-panel-active");
// });
    </script>
</body>
</html>




