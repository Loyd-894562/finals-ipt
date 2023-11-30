<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Luxury Homes Realty Inc.') }}</title>

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('https://media.salecore.com/salesaspects/shared/GlobalImageLibrary/Responsive/ElegantSeller/real-estate-home-exterior-40-1760-1000.jpg');
            background-size: cover;
            background-position: center;
            font-family: 'Nunito', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.9); /* Transparent white background with 90% opacity */
            border-radius: 0.375rem; /* 6px */
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.4), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 400px; /* Adjust the width as needed */
        }

        .brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .login-button {
            background-color: #4a5568; /* Dark Gray */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 0.25rem; /* 4px */
        }
    </style>
</head>
<body>
    <div>
        <div class="brand">{{ __('Luxury Homes Realty Inc.') }}</div>
        <div class="card">
            <x-guest-layout>
                <x-auth-card>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="button-container">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-button class="ml-3 login-button">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>
                </x-auth-card>
            </x-guest-layout>
        </div>
    </div>
</body>
</html>
