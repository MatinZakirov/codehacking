@extends('layouts.admin')


@section('content')


    <h1>Create page</h1>


            {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                    </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::text('category_id', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'Content:') !!}
                    {!! Form::text('body', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::select('title',array(''=>'Choose Author'),  null, ['class'=>'form-control']) !!}
                </div>


                    <div class="form-group">
                    {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
                    </div>


                {!! Form::close() !!}


@endsection