@extends('layouts.admin')
@section('content')
    
<h1 class="text-capitalize font-poppins">edit user</h1>

<div class="col-sm-2">

    <img src="{{$user->photo ? $user->photo->file: 'http://placehold.it/400x400'}}" alt="file not found" class="img-responsive img-rounded" width="80px">

</div>

<div class="col-sm-9">
        

    {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminUserController@update', $user->id], 'files'=>true]) !!}
        @csrf
        
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', $user->name, ['class'=>'form-control'],['value'=>'hello']) !!}
        @error('name')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    

    <div class="form-group">
        {!! Form::label('email', 'Email address:') !!}
        {!! Form::email('email', $user->email, ['class'=>'form-control']) !!}
    </div>
    @error('email')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', [''=>'Choose An Option', $roles], $user->role_id, ['class'=>'form-control']) !!}
    </div>
    @error('role_id')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


    <div class="form-group">
        {!! Form::label('is_admin', 'Status:') !!}
        {!! Form::select('is_admin', [1=>'Active', 0=>'Not Active'], null, ['class'=>'form-control']) !!}
    </div>
    @error('is_admin')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password',  ['class'=>'form-control']) !!}
    </div>
    @error('password')
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

        <div class="form-group">
            {!! Form::label('photo_id', 'Upload File:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>
        @error('file')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    
    {!!Form::submit('Edit User',['class'=>'btn btn-success'])!!}


    {!! Form::close() !!}

</div>









@endsection