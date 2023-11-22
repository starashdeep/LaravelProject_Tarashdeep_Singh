@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-muted mt-3">Available Books in {{ $library->name }}!</h3>
        </div>
    </div>
    <!-- dd($books); -->
    @if ($books->isEmpty())
        <div class="alert alert-info mt-4">
            This library is empty. No books added.
        </div>
    @else
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th>Sno.</th>
                    <th>Name</th>
                    <th>Total Pages</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td><a href="{{ asset('/books/' . $book->id) }}/show" class="text-dark">{{ $book->name }}</a></td>
                    <td><a href="{{ asset('/books/' . $book->id) }}/show" class="text-dark">{{ $book->total_pages }}</a></td>
                    <td>
                        <a href="{{ asset('/libraries/' . $book->id) }}/bookEdit" class="btn btn-dark btn-sm">Edit</a>

                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection