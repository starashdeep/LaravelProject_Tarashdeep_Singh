@extends('layouts.app')
@section('main')

    <div class="container">
        <h3 class="text-muted mt-3">Recently deleted products</h3>
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
                <a href="{{ asset('storage/products/'. $product->id) }}/restore" class="btn btn-dark btn-sm">Restore</a>

                <form action="{{route('products.forcedelete', $product->id)}}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>           
            </tr>
            @endforeach
          </tbody>
        </tabel>

    </div>

@endsection