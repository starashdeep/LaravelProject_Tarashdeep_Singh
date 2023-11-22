@extends('layouts.app')
@section('main')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h5 class="text-muted">#{{$child->first_name}} {{$child->last_name}} Edit</h5>
                    <form action="/children/{{ $child->id }}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <!-- Child details -->
                        <div class="form-group row">
                            <div class="col">
                                <label for="child_first_name">Child's First Name</label>
                                <input type="text" name="child_first_name" class="form-control" value="{{ old('child_first_name') }}" />
                                @if($errors->has('child_first_name'))
                                <span class="text-danger"> {{ $errors->first('child_first_name') }}</span>
                                @endif
                            </div>
                            <div class="col">
                                <label for="child_last_name">Child's Last Name</label>
                                <input type="text" name="child_last_name" class="form-control" value="{{ old('child_last_name') }}" />
                                @if($errors->has('child_last_name'))
                                <span class="text-danger"> {{ $errors->first('child_last_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="child_email_id">Child's Email Id</label>
                            <input type="text" name="child_email_id" class="form-control" value="{{ old('child_email_id') }}" />
                            @if($errors->has('child_email_id'))
                            <span class="text-danger"> {{ $errors->first('child_email_id') }}</span>
                            @endif
                        </div>

                        <!-- Guardian details -->
                        <div class="form-group row">
                            <div class="col">
                                <label for="guardian_first_name">Guardian's First Name</label>
                                <input type="text" name="guardian_first_name" class="form-control" value="{{ old('guardian_first_name') }}" />
                                @if($errors->has('guardian_first_name'))
                                <span class="text-danger"> {{ $errors->first('guardian_first_name') }}</span>
                                @endif
                            </div>
                            <div class="col">
                                <label for="guardian_last_name">Guardian's Last Name</label>
                                <input type="text" name="guardian_last_name" class="form-control" value="{{ old('guardian_last_name') }}" />
                                @if($errors->has('guardian_last_name'))
                                <span class="text-danger"> {{ $errors->first('guardian_last_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_no">Guardian's Phone Number</label>
                            <input type="text" name="phone_no" class="form-control" value="{{ old('phone_no') }}" />
                            @if($errors->has('phone_no'))
                            <span class="text-danger"> {{ $errors->first('phone_no') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="form-control btn btn-dark">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection