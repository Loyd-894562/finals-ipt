<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Luxury Homes Realty Inc.</title>

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
        }

        .overlay {
            background: rgba(0, 0, 0, 0.5);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .brand {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            gap: 20px;
            margin-top: 10px; /* Adjusted margin to bring buttons closer */
        }

        .login-button {
            background-color: #001f3f; /* Dark Blue */
            color: white;
            padding: 20px 30px;
            text-decoration: none;
            border-radius: 5px;
        }

        .register-button {
            background-color: #f0f0f0; /* Light Gray */
            color: #333;
            padding: 20px 30px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="brand">
            <img src="{{ asset('photos/logo1.png') }}" alt="Luxury Homes Realty Inc. " class="logo" style="width: 950px;">
        </div>
        <div class="button-container">
            <a href="{{ route('login') }}" class="login-button">Log in</a>
            <a href="{{ route('register') }}" class="register-button">Register</a>
        </div>
    </div>
</body>
</html>
