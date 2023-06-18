@include('front.include.header')
        <!-- Add your site or application content here -->
        @include('front.include.navbar')
		<!-- breadcrumb-area-start -->
		<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumb-content text-center">
							<div class="breadcrumb-title">
								<h3><a href="#">Home</a></h3>
							</div>
							<ul>
								<li><a href="#"><i class="fa fa-home"></i></a></li>
								<li class="active"><a href="#"><i class="fa fa-angle-right"></i>login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb-area-end -->
		<!-- user-login-area-start -->
		
		<!-- <div class="user-login-area mb-70">
		<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3  col-12">
		<div class="login-form">
		        <x-validation-errors class="mb-4" />

		        @if (session('status'))
		            <div class="mb-4 font-medium text-sm text-green-600">
		                {{ session('status') }}
		            </div>
		        @endif

		        <form method="POST" action="{{ route('login') }}">
		            @csrf

		            <div class="single-login">
		                <label for="email" value="{{ __('Email') }}" />
		                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
		            </div>

		            <div class="single-login">
		                <label for="password" value="{{ __('Password') }}" />
		                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
		            </div>

		            <div class="single-login single-login-2">
		                <label for="remember_me" class="flex items-center">
		                    <checkbox id="remember_me" name="remember" />
		                    <span>{{ __('Remember me') }}</span>
		                </label>
		            </div>

		            <div class="flex items-center justify-end mt-4">
		                @if (Route::has('password.request'))
		                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
		                        {{ __('Forgot your password?') }}
		                    </a>
		                @endif

		                <x-button class="ml-4">
		                    {{ __('Log in') }}
		                </x-button>
		            </div>
		        </form>
		</div>
		</div>
		</div> -->        
		<x-guest-layout>
		    <x-authentication-card>

		        <x-validation-errors class="mb-4" />

		        @if (session('status'))
		            <div class="mb-4 font-medium text-sm text-green-600">
		                {{ session('status') }}
		            </div>
		        @endif

		        <form method="POST" action="{{ route('login') }}">
		            @csrf

		            <div>
		                <x-label for="email" value="{{ __('Email') }}" />
		                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
		            </div>

		            <div class="mt-4">
		                <x-label for="password" value="{{ __('Password') }}" />
		                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
		            </div>

		            <div class="block mt-4">
		                <label for="remember_me" class="flex items-center">
		                    <x-checkbox id="remember_me" name="remember" />
		                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
		                </label>
		            </div>

		            <div class="flex items-center justify-end mt-4">
		                @if (Route::has('password.request'))
		                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
		                        {{ __('Forgot your password?') }}
		                    </a>
		                @endif

		                <x-button class="ml-4">
		                    {{ __('Log in') }}
		                </x-button>
		            </div>
		        </form>
		    </x-authentication-card>
		</x-guest-layout>
		<!-- user-login-area-end -->
	<!-- brand-area-start -->
		<div class="brand-area">
			<div class="container">
				<div class="row">
					<div class="brand-active bt-2 owl-carousel ptb-50">
						<div class="single-brand">
							<a href="#"><img src="img/brand/1.png" alt="brand" /></a>
						</div>
						<div class="single-brand">
							<a href="#"><img src="img/brand/2.png" alt="brand" /></a>
						</div>
						<div class="single-brand">
							<a href="#"><img src="img/brand/3.png" alt="brand" /></a>
						</div>
						<div class="single-brand">
							<a href="#"><img src="img/brand/4.png" alt="brand" /></a>
						</div>
						<div class="single-brand">
							<a href="#"><img src="img/brand/5.png" alt="brand" /></a>
						</div>
						<div class="single-brand">
							<a href="#"><img src="img/brand/6.png" alt="brand" /></a>
						</div>
						<div class="single-brand">
							<a href="#"><img src="img/brand/7.png" alt="brand" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- brand-area-end -->
		<!-- newsletter-area-start -->
		<div class="newsletter-area ptb-30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="newsletter-item">
							<div class="newsletter-content ">
								<h4>Newsletter</h4>
							</div>
							<div class="newsletter-form">
								<form action="#">
									<input type="text" placeholder="Enter your e-mail" />
									<a href="#"><i class="fa fa-paper-plane"></i></a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- newsletter-area-end -->
		@include('front.include.footer')
		@include('front.include.footerjs')
		