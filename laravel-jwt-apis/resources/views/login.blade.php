@extends('layouts.app')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <h5 class="text-muted">Fill the details to login!!</h5>
                <form action="{{ route('loginUser')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                            @if($errors->has('email'))
                            <span class="text-danger"> {{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}" />
                            @if($errors->has('password'))
                            <span class="text-danger"> {{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="form-control btn btn-dark">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection