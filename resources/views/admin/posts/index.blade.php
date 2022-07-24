@extends('layouts.admin')

@section('content')

<p class="h2">Posts</p>

{{-- Session() --}}

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
    
      <tr>
        <td>{{$post->id}}</td>
        <td><img src="{{ $post->photo ? $post->photo->file :  'http://placeholder.it/400x400'}}" alt="file not found" width="40px"></td>
        <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
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