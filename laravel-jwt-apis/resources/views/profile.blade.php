@extends('layouts.app')
@section('main')

<div class="container">
    <div class="row">
        <div class="col-sm-8 justify-content-center mt-4">
            <div class="card p-4">
                {{ $user }}
             </div>
        </div>
    </div>
</div>

@endsection