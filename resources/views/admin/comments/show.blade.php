@extends('layouts.admin')




@section('content')


    <h1>Comments</h1>
    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Post</th>
            <th scope="col">Author</th>
            <th scope="col">Body</th>
            <th>Created time</th>
            <th>Status</th>
            <th>Delete</th>
            <th>Replies</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td><a href="{{route('home.post', $comment->post->id)}}">{{$comment->post->title}}</a></td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->body}}</td>
                <td>{{$comment->created_at->diffForHumans()}}</td>


                @if($comment->is_active == 1)
                    <td>        {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
                        <input type="hidden" name="is_active" value="0">
                        <div class="form-group">
                            {!! Form::submit('UnApprove', ['class'=>'btn btn-success']) !!}
                        </div>


                        {!! Form::close() !!}</td>
                @else
                    <td>

                        {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update',$reply->id]]) !!}
                        <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                            {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                        </div>


                        {!! Form::close() !!}


                    </td>
                @endif

                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['CommentsController@destroy',$reply->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>


                        {!! Form::close() !!}
                    </td>
                    <td><a href="{{route('admin.comments.replies.show', $comment->id)}}">Replies</a></td>
            </tr>



        @endforeach
        </tbody>
    </table>


@endsection