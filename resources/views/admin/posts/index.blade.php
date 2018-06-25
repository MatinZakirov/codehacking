@extends('layouts.admin')


@section('content')


    <table class="table table-hover table-dark">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Author</th>
          <th scope="col">Category</th>
          <th class="col">Photo</th>
          <th class="col">Title</th>
          <th class="col">Body</th>
          <th class="col">Created</th>
          <th class="col">Updated</th>


        </tr>
      </thead>
      <tbody>
      @if($posts)
          @foreach($posts as $post)
        <tr>
          <th>{{$post->id}}</th>
          <td>{{$post->user->name}}</td>
          <td>{{$post->category_id}}</td>
          <td>{{$post->photo_id}}</td>
          <td>{{$post->title}}</td>
          <td>{{$post->body}}</td>
          <td>{{$post->created_at->diffForHumans()}}</td>
          <td>{{$post->updated_at->diffForHumans()}}</td>

        </tr>
        @endforeach
    @endif
      </tbody>
    </table>



@endsection