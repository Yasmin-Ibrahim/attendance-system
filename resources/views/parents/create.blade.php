@extends('layouts.app')
@section('content')
    <div class="create_parent container col-6 pt-4 mt-4">
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
                <h3>Add Parents
                    <a href="{{route('parents.index')}}" class="float-end mb-2">Back</a>
                </h3>
            </div>
            <div class="card-body">
                 <form action="{{route('parents.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="mb-2 type">Name Student: </label>
                        <select name="student_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Choose</option>
                            @foreach ($students as $student)
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="parent_first">The Name First: </label>
                        <input type="text" name="parent_first" id="parent_first" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="mb-2 type">Type 1: </label>
                        <select name="type1" class="form-select" aria-label="Default select example">
                            <option selected disabled>Choose</option>
                            <option value="father">father</option>
                            <option value="mother">mother</option>
                            <option value="g_father">g_father</option>
                            <option value="g_mother">g_mother</option>
                            <option value="sister">sister</option>
                            <option value="brother">brother</option>
                            <option value="uncle">uncle</option>
                            <option value="aunt">aunt</option>
                            <option value="friend">friend</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="phone_first">The Phone First: </label>
                        <input type="tel" name="phone_first" id="phone_first" class="form-control" minlength="7" maxlength="20">
                    </div>

                    <div class="form-group">
                        <label for="parent_second">The Name Second: </label>
                        <input type="text" name="parent_second" id="parent_second" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="mb-2 type">Type 2: </label>
                        <select name="type2" class="form-select" aria-label="Default select example">
                            <option selected disabled>Choose</option>
                            <option value="father">father</option>
                            <option value="mother">mother</option>
                            <option value="g_father">g_father</option>
                            <option value="g_mother">g_mother</option>
                            <option value="sister">sister</option>
                            <option value="brother">brother</option>
                            <option value="uncle">uncle</option>
                            <option value="aunt">aunt</option>
                            <option value="friend">friend</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="phone_second">The Phone Second: </label>
                        <input type="tel" name="phone_second" id="phone_second" class="form-control" minlength="7" maxlength="20">
                    </div>

                    <div class="form-group">
                        <label for="message">Write Note: </label>
                        <textarea class="form-control"id="message" name="message" cols="10" rows="3"></textarea>
                    </div>

                    <div class="d-grid">
                        <button>Create</button>
                    </div>
                </form>
            </div>
       </div>
    </div>
@endsection
