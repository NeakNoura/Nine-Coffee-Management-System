<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('assets/styles/style.css')}}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/fonts/icomoon/icomoon.woff') }}">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
<body>
    <div id="wrapper">
        @auth('admin')
        <!-- Show navbar only when the admin is logged in -->
        <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarText" aria-controls="navbarText"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">                 
                    <ul class="navbar-nav side-nav">
                        <li class="nav-item">
                            <a class="nav-link" style="margin-left:20px;" href="{{ route('admins.dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="margin-left:20px;" href="{{ route('all.admins') }}">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="margin-left:20px;" href="{{ route('all.orders') }}">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="margin-left:20px;" href="{{ route('all.products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="margin-left:20px;" href="{{ route('all.bookings') }}">Bookings</a>
                        </li>
                    </ul>

                    <!-- Right side menu -->
                    <ul class="navbar-nav ml-md-auto d-md-flex">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </div>
                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endauth

        <div class="container-fluid">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
