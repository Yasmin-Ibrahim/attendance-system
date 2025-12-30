@extends('layouts.app')
@section('content')
    <div class="register container col-5">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Done!  </strong>
                {{Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card p-3 mb-3">
            <div class="card-body">
                <form action="{{route('store.register')}}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name: </label>
                        <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone">Phone: </label>
                        <input type="tel" name="phone" value="{{old('phone')}}" id="phone" class="form-control" minlength="7" maxlength="20">
                    </div>

                    <div class="form-group mb-3">
                        <label for="username">Username: </label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}" id="username">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password: </label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}" id="password">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation">Confirmation Password: </label>
                        <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" id="password_confirmation">
                    </div>

                    <p>I Have Already An Account. <a href="{{route('login')}}">Login Now</a></p>

                    <div class="d-grid mt-3">
                        <button class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
