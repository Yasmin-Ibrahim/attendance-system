@extends('layouts.app')
@section('content')
    <div class="update_student container col-6 pt-4 mt-4">
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

       <div class="card p-3 mx-2 mt-2 mb-3">
            <div class="card-title">
                <h3>Update for Student
                    <a href="{{route('students.index')}}" class="float-end mb-2">Back</a>
                </h3>
            </div>
            <div class="card-body">
                 <form action="{{route('students.update', $student->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$student->name}}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone: </label>
                        <input type="tel" name="phone" id="phone" class="form-control" minlength="7" maxlength="20" value="{{$student->phone}}">
                    </div>

                    <div class="form-group">
                        <label class="mb-2 paid">Paid This Month: </label>
                        <select name="paid_this_month" class="form-select" aria-label="Default select example">
                            <option value="1" {{$student->paid_this_month==1 ? 'selected' : ''}}>Paid</option>
                            <option value="0" {{$student->paid_this_month==0 ? 'selected' : ''}}>Not Paid</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="due">Old Due: </label>
                        <input type="number" name="old_due" id="due" class="form-control" min="0" max="1000" step="1" value="{{$student->old_due}}">
                    </div>


                    <div class="d-grid">
                        <button class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
       </div>
    </div>
@endsection
