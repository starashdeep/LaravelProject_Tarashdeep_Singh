@extends('layouts.app')
@section('main')

    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-muted mt-3 ">Available Children data!</h3>
            <h6 class='text-muted md-0-mt-3'>Click on the child's name to see details</h6>
          </div>
        <div class="col-md-6 text-right">
            <a href="/children/create" class="btn btn-dark mt-3">Add New Child</a>
            <a href="/children/guardian/details" class="btn btn-dark mt-3">Guardian Details</a>
        </div>
    </div>
        
        <table class="table table-hover mt-4">
          <thead>
            <tr>
              <th>Sno.</th>
              <th>First_Name</th>
              <th>Last_Name</th>
              <th>Email_Id</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($children as $child)
            <tr>
              <td>{{ $loop->index+1 }}</td>           
              <td><a href="{{ asset('/children/'.$child->id) }}/show" class="text-dark"> {{$child->first_name}} </a></td>           
              <td>
                  <a href="{{ asset('/children/'.$child->id) }}/show" class="text-dark"> {{$child->last_name}} </a>
              </td>           
              <td>
                  <a href="{{ asset('/children/'.$child->id) }}/show" class="text-dark"> {{$child->email_id}} </a>
              </td>           
              <td>
                <a href="{{ asset('/children/'. $child->id) }}/edit" class="btn btn-dark btn-sm">Edit</a>

                <form action="{{route('children.destroy', $child->id)}}" method="POST" class="d-inline">
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