@extends('layouts.admin')

@section('content')

<p class="h2">Posts</p>

<table class="table table-striped  text-left">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Photo</th>
        <th>User</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created At</th>
        <th>Updated At</th>
      </tr>
    </thead>
     @if ($posts)
    @foreach ($posts as $post)
            
   <tbody>
    {{--   <img src="{{$post->photo_id}}" alt="file not found" width="40px"> 
    {{$post->photo ? $post->photo->file :  'http://placeholder.it/400x400'}}
    --}}
      <tr>
        <td>{{$post->id}}</td>
        <td><img src="{{ $post->photos ? $post->photo->file :  'http://placeholder.it/400x400'}}" alt="file not found" width="40px"></td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
        <td>{{$post->title }}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
      </tr>

    </tbody>
    
    @endforeach
    @endif

  </table>

@endsection