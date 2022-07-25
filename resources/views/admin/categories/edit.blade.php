@extends('layouts.admin')

@section('content')

<h2>Edit Categories</h2>
    

{!! Form::model($category, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminCategoriesController@update', $category->id]]) !!}
@csrf

<div class="form-group">
{!! Form::label('name', 'Name:') !!}
{!! Form::text('name', null, ['class'=>'form-control']) !!}
@error('title')
    <span class="invalid-feedback text-danger" role="alert">
         <strong>{{ $message }}</strong>
    </span>
@enderror
</div>


<div class="form-group">
    {!!Form::submit('Edit Category',['class'=>'btn btn-primary'])!!}
</div>

{!! Form::close() !!}


{!! Form::model($category, ['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminCategoriesController@destroy', $category->id]]) !!}

<div class="form-group">
    {!!Form::submit('Delete Category',['class'=>'btn btn-danger'])!!}
</div>

{!! Form::close() !!}


@endsection