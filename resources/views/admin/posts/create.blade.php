@extends('layouts.admin')




@section('content')

<h1>Create Post</h1>


{!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminPostsController@store', 'files' => true]) !!}


    {{-- <input type="text" name="title" placeholder="Enter title"> --}}
    {!! Form::label('title','Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
    <br>

    {!! Form::label('category_id','Category:') !!}
    {!! Form::select('category_id', [''=>'choose category'] + $categories ,null,['class'=>'form-control']) !!}
    <br>
    {!! Form::label('photo_id','Image:') !!}
    {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
    <br>

    {!! Form::label('body','Descripton:') !!}
    {!! Form::textarea('body', null,['class'=>'form-control']) !!}
    <br>

    {{ csrf_field() }}
    <br>
    {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
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
