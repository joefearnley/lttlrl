<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Little Url</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="/css/app.css" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token() ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <div class="container">
            <nav class="navbar" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{ url('/') }}">Little Url</a>
                    <button class="button navbar-burger" data-target="navMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <div id="navMenu" class="navbar-menu">
                    <div class="navbar-end">
                        @if (Auth::guest())
                            <a href="{{ url('/login') }}" class="navbar-item">Login</a>
                            <a href="{{ url('/register') }}" class="navbar-item">Sign Up</a>
                        @else
                            @if (Auth::check() && Route::getCurrentRoute()->uri() != '/')
                                <make-url-little-button></make-url-little-button>
                            @endif
                            <a href="{{ url('/account') }}" class="navbar-item">Account</a>
                            <a href="{{ url('/logout') }}" class="navbar-item">Logout</a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
        <hr class="nav-seperator">
        @yield('content')
    </div>
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>
