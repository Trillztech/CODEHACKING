@extends('layouts.admin')
@section('content')
    
<div class="container-fluid bg-inherit text-gray text-center text-capitalize">
    <h1 class="h2">My user Page</h1>

    @if (Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
        
    @endif

    <table class="table table-striped  text-left">
      <thead>
        <tr>
          <th>Id</th>
          <th>Profile</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Updated At</th>
        </tr>
      </thead>
      @if ($users)
      @foreach ($users as $user)
              
      <tbody>
        
        <tr>
          <td>{{$user->id}}</td>
          <td><a href="{{route('users.edit', $user->id)}}"><img src="{{$user->photo ? $user->photo->file: 'http://placeholder.it/400x400'}}" alt="file not found" width="40px"></a></td>
          <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
          <td>{{$user->email}}</td>
          <td>{{ $user->role->name }}</td>
          <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
          <td>{{$user->created_at->diffForHumans()}}</td>
          <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
  
      </tbody>
      
      @endforeach
      @endif

    </table>
  </div>

@endsection