<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Rental Mobil</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{route('home')}}">Aplikasi Rental Mobil</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="collapse navbar-collapse navbar-center" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                @if (Auth::user()->role === 'admin')
                                <li><a href="{{ route('tampilcar') }}">Manage Cars</a></li>
                                <li><a href="">Manage Rental</a></li>
                                @elseif (Auth::user()->role === 'user')
                                <li><a href="{{ route('tampilhistori') }}">History Sewa</a></li>
                                @endif
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{Auth::user()->name}} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a>Level: {{Auth::user()->role}}</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{route('actionlogout')}}"><i class="fa fa-power-off"></i> Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
            </nav>
            @yield('konten')
        </div>
    </div>
    </div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>