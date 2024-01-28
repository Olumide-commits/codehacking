@extends('layouts.admin')



@section('content')

<h1>Users</h1>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Photo</th>
        <th scope="col">role</th>
        <th scope="col">Status</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
      </tr>
    </thead>
    <tbody>



        @if($users)

            @foreach ($users as $user)


            <tr>
                <td scope="row">{{ $user->id }}</td>
                <td><img height="50" width="50" src="{{$user->photo ? $user->Photo->file : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png'}}"></td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                <td> <a href="{{route('user.edit', $user->id)}}"> {{ $user->name }} </a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at-> diffForHumans()}}</td>
                <td>{{ $user->updated_at}}</td>
              </tr>






            @endforeach




        @endif

@stop
