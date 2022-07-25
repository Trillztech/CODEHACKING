@extends('layouts.admin')

@section('content')

<p class="h2 text-capitalize">categories</p>


<div class="col-sm-5">

{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminCategoriesController@store']) !!}
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
    {!!Form::submit('Create Category',['class'=>'btn btn-primary'])!!}
</div>
@error('category_id')
  <span class="invalid-feedback text-danger" role="alert">
       <strong>{{ $message }}</strong>
  </span>
@enderror

</div>



<div class="col-sm-7">
    
<table class="table table-striped  text-left">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Name</th>
        <th> Created At </th>
        <th>Updated At</th>
      </tr>
    </thead>

    
     @foreach ($categories as $category)
            
   <tbody>
    
      <tr>
        <td>{{$category->id}}</td>
        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no Dates found'}}</td>
        <td>{{$category->updated_at ? $category->created_at->diffForHumans() : 'no Dates found'}}</td>
      </tr>

    </tbody>
    
    @endforeach


  </table>
</div>



@endsection