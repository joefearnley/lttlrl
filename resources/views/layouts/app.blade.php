<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Little Url</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    Little Url
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/account') }}"><i class="fa fa-btn fa-user"></i> Account</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </li>
                        @if (Auth::check() && Route::getCurrentRoute()->getPath() != '/')
                        <li><button id="show-add-url-form" class="btn btn-primary"><i class="fa fa-btn fa-plus"></i> Make Little Url</button></li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if (Auth::check() && Route::getCurrentRoute()->getPath() != '/')
        <div id="add-url-modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form id="add-url-form" data-toggle="validator" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Make Url Little</h4>
                        </div>
                        <div class="modal-body">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <input type="url" class="form-control" id="enter-url" name="url" placeholder="Enter Url" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default cancel-url-edit" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="submit-make-url-little-button" class="btn btn-primary ladda-button" data-style="expand-left">
                                <i class="fa fa-btn fa-save"></i> Make Little
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @yield('content')
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>
