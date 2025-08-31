{{-- @extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});" style ="margin-top: -5%" >
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Login</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="check.login">Home</a></span> <span>Login</span></p>
          </div>

        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <form action="{{ route('login') }}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
            @csrf
              <h3 class="mb-4 billing-heading">Login</h3>
                <div class="row align-items-end">
                    <div class="col-md-12">
                  <div class="form-group">
                      <label for="Email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
               
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="Password">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>

              </div>
              <div class="col-md-12">
                  <div class="form-group mt-4">
                          <div class="radio">
                              <button name="submit" type="submit" class="btn btn-primary py-3 px-4">Login</button>
                          </div>
                  </div>
              </div>           
            </form>
        </div> 
        </div>
      </div>
    </div>
  </section> 
@endsection --}}
@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});" style="margin-top: -5%">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Login</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span> <span>Login</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ftco-animate">

                <!-- Nav Tabs -->
                <ul class="nav nav-tabs mb-4" id="loginTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="user-tab" data-bs-toggle="tab" href="#user-login" role="tab" aria-controls="user-login" aria-selected="true">User Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="admin-tab" data-bs-toggle="tab" href="admin/login" role="tab" aria-controls="view.login" aria-selected="True">Admin Login</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="loginTabsContent">

                    <!-- User Login -->
                    <div class="tab-pane fade show active" id="user-login" role="tabpanel" aria-labelledby="user-tab">
                        <form action="{{ route('login') }}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
                            @csrf
                            <h3 class="mb-4 billing-heading">User Login</h3>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary py-3 px-4">Login</button>
                        </form>
                    </div>

                    <!-- Admin Login -->
                    <div class="tab-pane fade" id="admin-login" role="tabpanel" aria-labelledby="admin-tab">
                        <form action="{{ route('check.login') }}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
                            @csrf
                            <h3 class="mb-4 billing-heading">Admin Login</h3>
                            <div class="form-group">
                                <label for="admin-email">Email</label>
                                <input id="admin-email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="admin-password">Password</label>
                                <input id="admin-password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-danger py-3 px-4">Login as Admin</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection
