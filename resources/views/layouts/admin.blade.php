<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- This file has been downloaded from BoosSnipp.com. Enjoy! -->
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('assets/styles/style.css')}}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
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
                                <a class="nav-link" style="margin-left:20px;" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="margin-left:20px;" href="admins/admins.html">Admins</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="margin-left:20px;" href="index.html">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="margin-left:20px;" href="index.html">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="margin-left:20px;" href="index.html">Bookings</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-md-auto d-md-flex">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Login</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Username</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div> <!-- Closing div added -->
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid">
                <main class="py-4">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center mt-3">Login</h5>
                                    <form method="POST" action="login.php">
                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" id="email" class="form-control" required>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label for="password">Password:</label>
                                            <input type="password" name="password" id="password" class="form-control" required>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>

        <script type="text/javascript">
        </script>
    </body>
</html>
