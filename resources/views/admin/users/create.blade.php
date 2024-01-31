@extends('layouts.admin')


@section('content')

<h1>Create Users</h1>



{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminUsersController@store', 'files' => true]) !!}


    {{-- <input type="text" name="title" placeholder="Enter title"> --}}
    {!! Form::label('name','Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    <br>
    {!! Form::label('email','Email:') !!}
    {!! Form::email('email', null, ['class'=>'form-control']) !!}
    <br>
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id',[''=> 'choose option'] + $roles,null,['class'=>'form-control']) !!}
    <br>
    {!! Form::label('is_active','Status:') !!}
    {!! Form::select('is_active', array(1=>'Active', 0=> 'Not Active'), 0, ['class'=>'form-control']) !!}
    <br>
    {!! Form::label('photo_id','Image:') !!}
    {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
    <br>

    {!! Form::label('password','Password:') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
    <br>

    {{ csrf_field() }}
    <br>
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    {{-- <input type="submit" name="submit"> --}}







{!! Form::close() !!}


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





