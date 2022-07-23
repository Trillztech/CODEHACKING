@extends('layouts.admin')

@section('content')

<p class="h2 text-capitalize font-poppins">Create a Posts</p>



{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminPostController@store','files'=>true]) !!}
    @csrf
    
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
    @error('title')
        <span class="invalid-feedback text-danger" role="alert">
             <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  

<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', [''=>'Pick A Category', $categories], null, ['class'=>'form-control']) !!}
  </div>
  @error('category_id')
      <span class="invalid-feedback text-danger" role="alert">
           <strong>{{ $message }}</strong>
      </span>
  @enderror


   
<div class="form-group">
    {!! Form::label('body', 'Text:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
    @error('body')
        <span class="invalid-feedback text-danger" role="alert">
             <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  

  <div class="form-group">
    {!! Form::label('photo_id', 'Upload File:') !!}
    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
</div>
@error('file')
    <span class="invalid-feedback text-danger" role="alert">
         <strong>{{ $message }}</strong>
    </span>
@enderror


 
{!!Form::submit('Posts',['class'=>'btn btn-primary'])!!}


{!! Form::close() !!}





@endsection