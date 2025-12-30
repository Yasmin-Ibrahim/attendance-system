@extends('layouts.app')

@section('content')

    <div class="parents container col-6 pt-3 mt-3">
        <form method="GET" action="{{route('parents.index')}}" class="formToSearch mb-3">
            @csrf
            <input type="text" name="search" value="{{request('search')}}"
                class="search form-control" placeholder="Search By ID"
                oninput="checkSearch(this)" data-index-url = "{{route('parents.index')}}">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <h3 class="">All The Parents
            <a href="{{route('parents.create')}}" class="float-end">Create</a>
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
                <th scope="col">Student ID</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Phone</th>
                <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach ($parents as $parent)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><a href="{{route('students.show', $parent->student_id)}}" class="link-underline-light">{{$parent->student_id}}</a></td>
                    <td>{{$parent->parent_first}}</td>
                    <td>{{$parent->type1}}</td>
                    <td>{{$parent->phone_first}}</td>
                    <td><a href="{{route('parents.show', $parent->id)}}" class="text-info"><i class="fa-solid fa-eye"></i></a></td>
                    <td><a href="{{route('parents.edit', $parent->id)}}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td>
                        <form action="{{route('parents.destroy', $parent->id)}}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this parents?')">
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
