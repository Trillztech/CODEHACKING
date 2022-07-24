@extends('layouts.admin')

@section('content')

<p class="h2">Edit Posts</p>

<div class="col-sm-3">
    <img src="{{$post->photo->file}}" alt="file not found" class="img img-responsive">
</div>

<div class="col-sm-9">
    

{!! Form::model($post, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminPostController@update', $post->id],'files'=>true]) !!}
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
    {!! Form::select('category_id',  $categories, null, ['class'=>'form-control']) !!}
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


 
<div class="form-group">
{!!Form::submit('Edit Post',['class'=>'btn btn-primary'])!!}
</div>

{!! Form::close() !!}


{!! Form::model($post, ['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminPostController@destroy', $post->id],'files'=>true]) !!}

 
<div class="form-group">
{!!Form::submit('Delete Post',['class'=>'btn btn-danger'])!!}
</div>

{!! Form::close() !!}

</div>


@endsection