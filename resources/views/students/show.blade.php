@extends('layouts.app')
@section('content')
<div class="show container col-7">
    <div class="card p-2">
        <div class="card-title">
            <h3>Student Data
                <a href="{{route('students.index')}}" class="float-end mb-2">Back</a>
            </h3>
        </div>
        <div class="card-body">
            <h6>ID: {{$student->id}}</h6>
            <hr>
            <h6>Name: {{$student->name}}</h6>
            <hr>
            <h6>Phone: {{$student->phone}}</h6>
            <hr>
            <h6>Paid This Month: {{$student->paid_this_month}}</h6>
            <hr>
            <h6>Any Old Due: {{$student->old_due}}</h6>
            <hr>
            <div class="qr-code mt-5">
                <img src="{{ asset('storage/qrcodes/' . $student->qr_code . '.svg') }}" alt="QR Code">
            </div>
        </div>
    </div>
</div>
@endsection
