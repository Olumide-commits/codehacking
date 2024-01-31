@extends('layouts.admin')




@section('content')

<h1>Posts</h1>


<table class="table">


    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">User_id</th>
        <th scope="col">Category_id</th>
        <th scope="col">Photo_id</th>
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
      </tr>
    </thead>
    <tbody>

        @if($posts)

        @foreach ($posts as $post)


        <tr>
            <td scope="row">{{ $post->id }}</td>
            <td>{{ $post->title}}</td>
            <td>{{ $post->body}}</td>
            <td> {{ $post->user->name }}</td>
            <td>{{ $post->category ? $post->category->name : "Not categorized"}}</td>
            <td><img height="50" width="50" src="{{$post->user->photo ? $post->user->Photo->file : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png'}}"</td>
            <td>{{ $post->created_at-> diffForHumans()}}</td>
            <td>{{ $post->updated_at-> diffForHumans()}}</td>
          </tr>

        @endforeach




    @endif


@stop
