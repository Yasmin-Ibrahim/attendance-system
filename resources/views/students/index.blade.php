@extends('layouts.app')

@section('content')

    <div class="students container col-6 pt-3 mt-3">
        <form method="GET" action="{{route('students.index')}}" class="formToSearch mb-3">
            @csrf
            <input type="text" name="search" value="{{request('search')}}"
                class="search form-control" placeholder="Search By Name"
                oninput="checkSearch(this)" data-index-url = "{{route('students.index')}}">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <h3 class="">All Student
            <a href="{{route('students.create')}}" class="float-end">Create</a>
        </h3>

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Done!  </strong>
                {{Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <table class="table text-center">
            <thead class="">
                <tr>
                <th scope="col">Num</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach ($students as $student)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$student->name}}</td>
                    <td>{{$student->phone}}</td>
                    <td><a href="{{route('students.show', $student->id)}}" class="text-info"><i class="fa-solid fa-eye"></i></a></td>
                    <td><a href="{{route('students.edit', $student->id)}}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td>
                        <form action="{{route('students.destroy', $student->id)}}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this student?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-danger btn-link"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
@endsection
