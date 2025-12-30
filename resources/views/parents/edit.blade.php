@extends('layouts.app')
@section('content')
    <div class="update_parent container col-6 pt-4 mt-4">
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
                <h3>Update Parents
                    <a href="{{route('parents.index')}}" class="float-end mb-2">Back</a>
                </h3>
            </div>
            <div class="card-body">
                 <form action="{{route('parents.update', $parent->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="mb-2 type">Name Student: </label>
                        <select name="student_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Choose</option>
                            @foreach ($students as $student)
                                @if ($parent->student_id == $student->id)
                                    <option value="{{$student->id}}" selected>{{$student->name}}</option>
                                @else
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="parent_first">The Name First: </label>
                        <input type="text" name="parent_first" id="parent_first" class="form-control" value="{{$parent->parent_first}}">
                    </div>

                    <div class="form-group">
                        <label class="mb-2 type">Type 1: </label>
                        <select name="type1" class="form-select" aria-label="Default select example">
                            <option disabled>Choose</option>
                            <option value="father" {{$parent->type1=='father' ? 'selected' : ''}}>father</option>
                            <option value="mother" {{$parent->type1=='mother' ? 'selected' : ''}}>mother</option>
                            <option value="g_father" {{$parent->type1=='g_father' ? 'selected' : ''}}>g_father</option>
                            <option value="g_mother" {{$parent->type1=='g_mother' ? 'selected' : ''}}>g_mother</option>
                            <option value="sister" {{$parent->type1=='sister' ? 'selected' : ''}}>sister</option>
                            <option value="brother" {{$parent->type1=='brother' ? 'selected' : ''}}>brother</option>
                            <option value="uncle" {{$parent->type1=='uncle' ? 'selected' : ''}}>uncle</option>
                            <option value="aunt" {{$parent->type1=='aunt' ? 'selected' : ''}}>aunt</option>
                            <option value="friend" {{$parent->type1=='friend' ? 'selected' : ''}}>friend</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="phone_first">The Phone First: </label>
                        <input type="tel" name="phone_first" id="phone_first" class="form-control" minlength="7" maxlength="20" value="{{$parent->phone_first}}">
                    </div>

                    <div class="form-group">
                        <label for="parent_second">The Name Second: </label>
                        <input type="text" name="parent_second" id="parent_second" class="form-control" value="{{$parent->parent_second}}">
                    </div>

                    <div class="form-group">
                        <label class="mb-2 type">Type 2: </label>
                        <select name="type2" class="form-select" aria-label="Default select example">
                            <option disabled>Choose</option>
                            <option value="father" {{$parent->type2=='father' ? 'selected' : ''}}>father</option>
                            <option value="mother" {{$parent->type2=='mother' ? 'selected' : ''}}>mother</option>
                            <option value="g_father" {{$parent->type2=='g_father' ? 'selected' : ''}}>g_father</option>
                            <option value="g_mother" {{$parent->type2=='g_mother' ? 'selected' : ''}}>g_mother</option>
                            <option value="sister" {{$parent->type2=='sister' ? 'selected' : ''}}>sister</option>
                            <option value="brother" {{$parent->type2=='brother' ? 'selected' : ''}}>brother</option>
                            <option value="uncle" {{$parent->type2=='uncle' ? 'selected' : ''}}>uncle</option>
                            <option value="aunt" {{$parent->type2=='aunt' ? 'selected' : ''}}>aunt</option>
                            <option value="friend" {{$parent->type2=='friend' ? 'selected' : ''}}>friend</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="phone_second">The Phone Second: </label>
                        <input type="tel" name="phone_second" id="phone_second" class="form-control" minlength="7" maxlength="20" value="{{$parent->phone_second}}">
                    </div>

                    <div class="form-group">
                        <label for="message">Write Note: </label>
                        <textarea class="form-control"id="message" name="message" cols="10" rows="3">{{$parent->message}}</textarea>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
       </div>
    </div>
@endsection
