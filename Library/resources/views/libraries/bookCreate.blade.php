@extends('layouts.app')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <h5 class="text-muted">Book Details</h5>
                <form action="{{ route('books.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            <label for="book_name">Book Name</label>
                            <input type="text" name="book_name" class="form-control" value="{{ old('book_name') }}" />
                            @if($errors->has('book_name'))
                            <span class="text-danger"> {{ $errors->first('book_name') }}</span>
                            @endif
                        </div>
                        <div class="col">
                            <label for="book_total_pages">Total Pages</label>
                            <input type="text" name="book_total_pages" class="form-control" value="{{ old('book_total_pages') }}" />
                            @if($errors->has('book_total_pages'))
                            <span class="text-danger"> {{ $errors->first('book_total_pages') }}</span>
                            @endif
                        </div>
                        <div class="col">
                            <label for="library_id">Library</label>
                            <select name="library_id" class="form-control">
                                @foreach($libraries as $library)
                                    <option value="{{ $library->id }}">{{ $library->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('library_id'))
                                <span class="text-danger">{{ $errors->first('library_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="form-control btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection