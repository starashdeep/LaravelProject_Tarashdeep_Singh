@extends('layouts.app')
@section('main')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h5 class="text-muted">#{{$library->name}} Edit</h5>
                    <form action="/libraries/{{ $library->id }}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group row">
                            <div class="col">
                                <label for="library_name">Name</label>
                                <input type="text" name="library_name" class="form-control" value="{{ old('library_name') }}" />
                                @if($errors->has('library_name'))
                                <span class="text-danger"> {{ $errors->first('library_name') }}</span>
                                @endif
                            </div>
                            <div class="col">
                                <label for="library_owner">Owner</label>
                                <input type="text" name="library_owner" class="form-control" value="{{ old('library_owner') }}" />
                                @if($errors->has('library_owner'))
                                <span class="text-danger"> {{ $errors->first('library_owner') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="library_phone_no">Phone No</label>
                            <input type="text" name="library_phone_no" class="form-control" value="{{ old('library_phone_no') }}" />
                            @if($errors->has('library_phone_no'))
                            <span class="text-danger"> {{ $errors->first('library_phone_no') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="library_address">Address</label>
                            <input type="text" name="library_address" class="form-control" value="{{ old('library_address') }}" />
                            @if($errors->has('library_address'))
                            <span class="text-danger"> {{ $errors->first('library_address') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="form-control btn btn-dark">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection