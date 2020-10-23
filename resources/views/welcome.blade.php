<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;1,400;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Garamond';
            background-image: url("https://source.unsplash.com/S_eu4NqJt5Y/1600x900");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            min-height: 100vh;
        }

        a {
            font-size: 2rem;
        }
    </style>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
    <div class="container vh-100">
        <div class="row h-100">
            <div class="col-sm-12 my-auto">
                <h1>Hello<br>
                    login or register <br>
                    to get access <br>
                    to the store
                </h1>
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block text-light">
                        @auth
                            <div class="btn btn-outline-dark">
                                <a href="{{ url('/home') }}" class="text-decoration-none text-reset">Home</a>
                            </div>
                        @else
                            <div class="btn btn-outline-dark">
                                <a href="{{ route('login') }}" class="text-decoration-none text-reset">Login</a>
                            </div>

                            @if (Route::has('register'))
                                <div class="btn btn-outline-dark">
                                    <a href="{{ route('register') }}"
                                       class="text-decoration-none text-reset">Register</a>
                                </div>
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>
