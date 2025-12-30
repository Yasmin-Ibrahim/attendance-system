@extends('layouts.app')
@section('content')
<div class="show container col-7">
    <div class="card p-2">
        <div class="card-title">
            <h3>Parents Data ID: {{$parent->id}}
                <a href="{{route('parents.index')}}" class="float-end mb-2">Back</a>
            </h3>
        </div>
        <div class="card-body">
            <h6>Student ID: {{$parent->student_id}}</h6>
            <hr>
            <h6>The First Name: {{$parent->parent_first}}</h6>
            <hr>
            <h6>The First Type: {{$parent->type1}}</h6>
            <hr>
            <h6>The First Phone: {{$parent->phone_first}}</h6>
            <hr>
            @if (!empty($parent->phone_second))
                <h6>The Second Name: {{$parent->parent_second}}</h6>
                <hr>
                <h6>The Second Type: {{$parent->type2}}</h6>
                <hr>
                <h6>The Second Phone: {{$parent->phone_second}}</h6>
                <hr>
            @endif
            @if (!empty($parent->phone_second))
                <h6>Important Note: {{$parent->message}}</h6>
            @else
                <h6>Important Note: Not Found</h6>
            @endif
        </div>
    </div>
</div>
@endsection
