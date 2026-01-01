@extends('layouts.app')

@section('content')

    <div class="attendances container col-6 pt-3 mt-3">
        <form method="GET" action="{{route('attendances')}}" class="formToSearch mb-3">
            @csrf
            <input type="text" name="search" value="{{request('search')}}"
                class="search form-control" placeholder="Search By Name"
                oninput="checkSearch(this)" data-index-url = "{{route('attendances')}}">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <h3 class="">Attendances All Student</h3>

        <table class="table text-center">
            <thead class="">
                <tr>
                <th scope="col">Num</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach ($attendaces as $attendace)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$attendace->student->name}}</td>
                    <td>{{$attendace->created_at->format('d-m-Y')}}</td>
                    <td>{{$attendace->created_at->format('h:i A')}}</td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
@endsection
