@extends('layouts.app')
@section('content')
    <div class="login container col-4 pt-5 mt-5">
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

        @if (Session::has('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{Session::get('fail')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- <h3 class="m-2">Login: </h3> --}}
        <div class="card p-3">
            <div class="card-title"></div>
            <div class="card-body">
                <form action="{{route('store.login')}}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="username">Username: </label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}" id="username">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password: </label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}" id="password">
                    </div>

                    <p>I Don't Have An Account. <a href="{{route('register')}}">Register Now</a></p>

                    <div class="d-grid mt-3">
                        <button class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
