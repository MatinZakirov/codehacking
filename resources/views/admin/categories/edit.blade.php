@extends('layouts.admin')



@section('content')

    <h1>Edit Categories</h1>

<div class="col-md-6">
    {!! Form::model($category ,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Category Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Category',  ['class'=>'btn btn-primary col-md-3']) !!}
        {!! Form::close() !!}


        <div class="col-md-6"></div>

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete Category',  ['class'=>'btn btn-danger col-md-3']) !!}
        </div>


        {!! Form::close() !!}
    </div>



</div>




    @endsection