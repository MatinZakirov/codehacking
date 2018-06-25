@extends('layouts.admin')


@section('content')



    <h1>Edit User</h1>
    <div class="row">
    <div class="col-md-3">

        <img src="{{$user->photo ? $user->photo->file : 'http://via.placeholder.com/200x200'}}" alt="" class="img-responsive img-rounded">

    </div>

    <div class="col-md-9">
    {!! Form::model($user,  ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password',  ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Image:') !!}
        {!! Form::file('photo_id',null,  ['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', array(''=>'Choose Role') + $roles, null,  ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array(''=>'Choose Status', 1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update User', ['class'=>'btn btn-primary col-md-3']) !!}



    {!! Form::close() !!}


        <div class="col-md-6"></div>

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}


            {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-md-3']) !!}



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