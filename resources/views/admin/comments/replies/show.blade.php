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

        </tr>
        </thead>
        <tbody>
        @foreach($replies as $reply)
            <tr>
                <td>{{$reply->id}}</td>
                <td><a href="{{route('home.post', $reply->comment->post->id)}}">{{$reply->comment->post->title}}</a></td>
                <td>{{$reply->author}}</td>
                <td>{{$reply->body}}</td>
                <td>{{$reply->created_at->diffForHumans()}}</td>


                @if($reply->is_active == 1)
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

                    {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    </div>


                    {!! Form::close() !!}
                </td>
            </tr>



        @endforeach
        </tbody>
    </table>


@endsection