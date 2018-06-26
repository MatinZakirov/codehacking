@extends('layouts.admin')


@section('content')


    <h1>Edit page</h1>
    <div class="row">
            <div class="col-md-3">
                <img class="img-responsive img-rounded"  src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/200x200'}}" alt="">
                </div>


        <div class="col-md-9">
    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', array(''=>'Select category') + $categories, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Content:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Edit Post', ['class'=>'btn btn-primary col-md-2']) !!}



    {!! Form::close() !!}
        <div class="col-md-8"></div>

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}


        {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-md-2']) !!}



        {!! Form::close() !!}

    </div>
        </div>
    </div>
    @if(count($errors) > 0)

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>


    @endif



@endsection