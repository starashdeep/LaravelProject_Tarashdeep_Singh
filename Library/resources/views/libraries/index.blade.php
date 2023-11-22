@extends('layouts.app')
@section('main')

    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-muted mt-3 ">Available Libraries!</h3>
            <h6 class='text-muted md-0-mt-3'>Click on the library name to see books...</h6>
          </div>
        <div class="col-md-6 text-right">
            <a href="/libraries/create" class="btn btn-dark mt-3">Add New Library</a>
            <a href="/libraries/bookCreate" class="btn btn-dark mt-3">Add New Book</a>
        </div>
    </div>
        
        <table class="table table-hover mt-4">
          <thead>
            <tr>
              <th>Sno.</th>
              <th>Name</th>
              <th>Owner</th>
              <th>Phone_no</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($libraries as $library)
            <tr>
              <td>{{ $loop->index+1 }}</td>           
              <td><a href="{{ asset('/libraries/'.$library->id) }}/show" class="text-dark"> {{$library->name}} </a></td>           
              <td>
                  <a href="{{ asset('/libraries/'.$library->id) }}/show" class="text-dark"> {{$library->owner}} </a>
              </td>           
              <td>
                  <a href="{{ asset('/libraries/'.$library->id) }}/show" class="text-dark"> {{$library->phone_no}} </a>
              </td>           
              <td>
                  <a href="{{ asset('/libraries/'.$library->id) }}/show" class="text-dark"> {{$library->address}} </a>
              </td>           
              <td>
                <a href="{{ asset('/libraries/'. $library->id) }}/edit" class="btn btn-dark btn-sm">Edit</a>

                <form action="{{route('libraries.destroy', $library->id)}}" method="POST" class="d-inline">
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