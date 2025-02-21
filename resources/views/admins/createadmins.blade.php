@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-3 mx-auto"> 
        <div class="card">
            <div class="card-body text-center"> 
                <h5 class="card-title mb-5 d-inline">Create Admins</h5>
                <form method="POST" action="{{ route('create.admins') }}" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-outline mb-4 mt-4 text-start">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    @if($errors->has('email'))
                    <p class="alert alert-success">{{ $errors->first('email') }}</p>
                    @endif
                    <div class="form-outline mb-4 mt-4 text-start">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    @if($errors->has('username'))
                    <p class="alert alert-success">{{ $errors->first('username') }}</p>
                    @endif
                    <div class="form-outline mb-4 mt-4 text-start">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    @if($errors->has('password'))
                    <p class="alert alert-success">{{ $errors->first('password') }}</p>
                    @endif
                    <button type="submit" class="btn btn-primary">Create Admin</button>
                </form>
            </div>     
        </div>  
    </div>   
</div>

@endsection
