@extends('layouts.blog-post')



@section('content')

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo->file}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>

        <hr>

        <!-- Blog Comments -->
        @if(Session::has('comment_message'))
            <p class="bg-danger">{{session('comment_message')}}</p>
            @endif
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
                        {!! Form::open(['method'=>'POST', 'action'=>'CommentsController@store']) !!}
                            <div class="form-group">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                {!! Form::label('body', 'Body:') !!}
                                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                                </div>
                                <div class="form-group">
                                {!! Form::submit('Add Comment', ['class'=>'btn btn-primary']) !!}
                                </div>


                            {!! Form::close() !!}
        </div>

        <hr>

        <!-- Posted Comments -->

        <!-- Comment -->
        @foreach($comments as $comment)

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object img-responsive" height="64" width="64" src="{{$comment->photo}}">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    {{$comment->body}}
                    <button class="pull-right btn btn-primary toggle-reply">Reply</button>
                    @foreach($comment->replies as $reply)
                    <div class="media ">
                        <a class="pull-left" href="#">
                            <img class="media-object img-responsive" height="64" width="64" src="{{$reply->photo}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                            {{$reply->body}}
                        </div>

                    </div>
                        @endforeach
                    <div class="comment-reply">
                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                    <div class="form-group">
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        {!! Form::text('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                    </div>


                    {!! Form::close() !!}
                    </div>
                </div>
            </div>

    @endforeach
        <!-- Comment -->



    </div>

@endsection



@section('categories')


    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                @if($categories)
              @foreach($categories as $category)
                  <li><a href="">{{$category->name}}</a></li>
                  @endforeach
                    @endif
            </ul>
        </div>


   @endsection

@section('scripts')
<script>
    $('.toggle-reply').click(function(){

        $('.comment-reply').slideToggle('slow');
    })

</script>


@endsection