@extends('layouts.app')
@section('main')

<div class="container">
    <div class="row">
        <div class="col-sm-8 justify-content-center mt-4">
            <div class="card p-4">
                <p>Child's Name: <b>{{$child->first_name}} {{$child->last_name}}</b></p>
                <p>Child's Email Id: <b>{{$child->email_id}}</b></p>
                <p>Guardian's Name: <b>{{$child->guardian->first_name}} {{$child->guardian->last_name}}</b></p>
                <p>Guardian's Phone No.: <b>{{$child->guardian->phone_no}}</b></p>
            </div>
        </div>
    </div>
</div>

@endsection