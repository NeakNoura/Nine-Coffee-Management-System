          @extends('layouts.app')
          @section('content')

          <div class="row">
              <div class="col">
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title mb-4 d-inline">Admins</h5>
                          <a href="{{ route('create.admins') }}" class="btn btn-primary mb-4 text-center float-start"></a>
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Name</th>
                  <th scope="col">Gmail</th>
                  <th scope="col">Password</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($allAdmins as $admin)
                  <tr>
                      <th scope="row">{{$admin->id}}</th>
                      <td>{{$admin->name}}</td>
                      <td>{{$admin->email}}</td>
                      <td>{{$admin->password}}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

@endsection