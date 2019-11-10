<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tweets App</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/114202d30f.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <script>
            function sendRequest(method, url, callback) {
                const request = new XMLHttpRequest();
                const _callback = callback || null;
                
                request.onreadystatechange = function() {
                    if(request.readyState === 4) {
                        if(request.status === 200) { 
                            const json = JSON.parse(request.responseText);
                            console.log(json);

                            if (_callback && typeof _callback === 'function') {
                                callback(json);
                            }
                        }
                    }
                }
                
                request.open(method, url, true);
                request.send();
            }
        </script>
    </head>

    <body>
        @if ($navbar)
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container"> 
                    <a class="navbar-brand text-primary" href="/"><b>Home</b></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbar" aria-controls="conteudoNavbar" aria-expanded="false" aria-label="Alterna navegação">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="conteudoNavbar">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Páginas
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                    <a class="dropdown-item" href="{{ route('web.index') }}">Lista Tweets</a>
                                    <a class="dropdown-item" href="{{ route('web.top.users') }}">Top Users Por Seguidores</a>
                                    <a class="dropdown-item" href="{{ route('web.total.hour') }}">Total Posts Por Hora</a>
                                    <a class="dropdown-item" href="{{ route('web.total.tag.lang.local') }}">Total Posts Por Hashtag, Língua e Local</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    API
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('api.index') }}" target="_blank">Lista Tweets</a>
                                    <a class="dropdown-item" href="{{ route('api.top.users') }}" target="_blank">Top Users Por Seguidores</a>
                                    <a class="dropdown-item" href="{{ route('api.total.hour') }}" target="_blank">Total Posts Por Hora</a>
                                    <a class="dropdown-item" href="{{ route('api.total.tag.lang.local') }}" target="_blank">Total Posts Por Hashtag, Língua e Local</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @endif

        @yield('content')
        @yield('js')
    </body>
</html>
