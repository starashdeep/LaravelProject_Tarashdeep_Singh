@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-muted mt-3">Available Products</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="products/create" class="btn btn-dark mt-3">New Product</a>
                <a href="/storage/products/archive" class="btn btn-dark mt-3">Archives</a>
            </div>
        </div>

        @if(session('deleteSuccess'))
            <div class="alert alert-danger mt-3">
                {{ session('deleteSuccess') }}
            </div>
        @endif

        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th>Sno.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td><a href="{{ asset('storage/products/'.$product->id) }}/show" class="text-dark"> {{$product->name}} </a></td>
                        <td>
                            <img src="{{ asset('storage/products/'.$product->image) }}" class="rounded-circle" width="40" height="40"/>
                        </td>
                        <td>
                            <a href="{{ asset('storage/products/'.$product->id) }}/edit" class="btn btn-dark btn-sm">Edit</a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection