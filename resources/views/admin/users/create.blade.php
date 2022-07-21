@extends('layouts.admin')
@section('content')
    
<h1 class="text-capitalize font-poppins">create user</h1>


{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminUserController@store', 'files'=>true]) !!}
    @csrf
    
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    @error('name')
        <span class="invalid-feedback text-danger" role="alert">
             <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  

<div class="form-group">
    {!! Form::label('email', 'Email address:') !!}
    {!! Form::email('email', null, ['class'=>'form-control']) !!}
  </div>
  @error('email')
      <span class="invalid-feedback text-danger" role="alert">
           <strong>{{ $message }}</strong>
      </span>
  @enderror


  <div class="form-group">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id', [''=>'Choose An Option', $roles], null, ['class'=>'form-control']) !!}
  </div>
  @error('role_id')
      <span class="invalid-feedback text-danger" role="alert">
           <strong>{{ $message }}</strong>
      </span>
  @enderror


  <div class="form-group">
    {!! Form::label('is_admin', 'Status:') !!}
    {!! Form::select('is_admin', [1=>'Active', 0=>'Not Active'], 0, ['class'=>'form-control']) !!}
  </div>
  @error('is_admin')
      <span class="invalid-feedback text-danger" role="alert">
           <strong>{{ $message }}</strong>
      </span>
  @enderror


  <div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
  </div>
  @error('password')
      <span class="invalid-feedback text-danger" role="alert">
           <strong>{{ $message }}</strong>
      </span>
  @enderror

    <div class="form-group">
        {!! Form::label('upload File', 'Upload File:') !!}
        {!! Form::file('file', null, ['class'=>'form-control']) !!}
    </div>
    @error('file')
        <span class="invalid-feedback text-danger" role="alert">
             <strong>{{ $message }}</strong>
        </span>
    @enderror

 
{!!Form::submit('Create User',['class'=>'btn btn-primary'])!!}


{!! Form::close() !!}










@endsection