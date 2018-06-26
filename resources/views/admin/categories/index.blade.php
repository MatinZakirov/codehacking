@extends('layouts.admin')



@section('content')

    <h1>Categories</h1>


    <div class="col-md-3">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Category Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category',  ['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}
    </div>


    <div class="col-md-9">
    @if($categories)

    <table class="table table-hover table-dark">
      <thead>
        <tr>

          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Created Date</th>
        </tr>
      </thead>
      <tbody>
      @foreach($categories as $category)
        <tr>
          <td>{{$category->id}}</td>
          <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
          <td>{{$category->created_at ? $category->created_at->diffForHumans() : "Recently"}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>


    @endif

    </div>


@endsection