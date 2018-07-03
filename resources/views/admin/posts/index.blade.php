@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_post'))
        <p class="text-danger bg-danger">{{session('deleted_post')}}</p>
      @endif

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
          <td>{{$post->category ? $post->category->name : 'No category'}}</td>
          <td><img height="35" src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/450x300' }}" alt=""></td>
          <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
          <td>{{$post->body}}</td>
          <td>{{$post->created_at->diffForHumans()}}</td>
          <td>{{$post->updated_at->diffForHumans()}}</td>
          <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
          <td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>

        </tr>
        @endforeach
    @endif
      </tbody>
    </table>

      <div class="row">
        <div class="col-sm-6 col-sm-offset-4">
          {{$posts->render()}}
        </div>
      </div>



@endsection