@extends('layouts.app')
@section('main')

    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-muted mt-3 ">Available Guardian data!</h3>
          </div>
    </div>
        
        <table class="table table-hover mt-4">
          <thead>
            <tr>
              <th>Sno.</th>
              <th>First_Name</th>
              <th>Last_Name</th>
              <th>Phone No.</th>
            </tr>
          </thead>
          <tbody>
            @foreach($children as $child)
            <tr>
              <td>{{ $loop->index+1 }}</td>           
              <td><a href="{{ asset('/children/'.$child->guardian->id) }}/show" class="text-dark"> {{$child->guardian->first_name}} </a></td>           
              <td>
                  <a href="{{ asset('/children/'.$child->guardian->id) }}/show" class="text-dark"> {{$child->guardian->last_name}} </a>
              </td>           
              <td>
                  <a href="{{ asset('/children/'.$child->guardian->id) }}/show" class="text-dark"> {{$child->guardian->phone_no}} </a>
              </td>                      
            </tr>
            @endforeach
          </tbody>
        </tabel>

    </div>

@endsection