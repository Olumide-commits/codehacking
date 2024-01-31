@extends('layouts.admin')


@section('content')

<h1>Edit Users</h1>



<div class="col-sm-3">

    <img src="{{ $user->photo? $user->photo->file : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png'}}" alt="" class="img-responsive img-rounded ">

</div>


<div class="col-sm-9">




    {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['App\Http\Controllers\AdminUsersController@update', $user->id], 'files' => true]) !!}


        {{-- <input type="text" name="title" placeholder="Enter title"> --}}
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        <br>
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
        <br>
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', $roles ,null,['class'=>'form-control']) !!}
        <br>
        {!! Form::label('is_active','Status:') !!}
        {!! Form::select('is_active', array(1=>'Active', 0=> 'Not Active'), null, ['class'=>'form-control']) !!}
        <br>
        {!! Form::label('photo_id','Image:') !!}
        {!! Form::file('photo_id', ['class'=>'form-control']) !!}
        <br>

        {!! Form::label('password','Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
        <br>

        {{ csrf_field() }}
        <br>
        {!! Form::submit('Update', ['class'=>'btn btn-primary col-sm-3']) !!}
        {{-- <input type="submit" name="submit"> --}}







    {!! Form::close() !!}


{!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminUsersController@destroy', $user->id]]) !!}


{{-- <input type="text" name="title" placeholder="Enter title"> --}}

{!! Form::submit('delete user', ['class'=>'btn btn-danger col-sm-3']) !!}
{{-- <input type="submit" name="submit"> --}}







{!! Form::close() !!}

</div>


@stop



@if(count($errors)>0)

    <div class= "alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

             @endforeach

        </ul>
    </div>

@endif





