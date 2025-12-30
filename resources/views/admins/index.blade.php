@extends('layouts.app')

@section('content')

    <div class="admins container pt-3 mt-3">
        <h3 class="">All Admins</h3>
        <div class="big-card">
            @foreach ($admins as $admin)
            <div class="card m-3 p-3 col-3">
                <div class="card-title">Admin {{$loop->iteration}}</div>
                <div class="card-body">
                    <h6>Name: {{$admin->name}}</h6>
                    <hr>
                    <h6>Phone: {{$admin->phone}}</h6>
                    <hr>
                    <h6>Email: {{$admin->email}}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
