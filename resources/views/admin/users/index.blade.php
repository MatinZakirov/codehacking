@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_user'))

        <p class="bg-danger text-danger">{{session('deleted_user')}}</p>

    @endif

    <h1>Users</h1>






    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Photo</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Status</th>


        </tr>
        </thead>
        <tbody>
        @if($users)
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
            <td><img height="30" src="{{$user->photo ? $user->photo->file : 'http://via.placeholder.com/450x300'}}" alt=""></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td>{{$user->is_active == 1 ? "Active" : "Not Active"}}</td>

        </tr>
            @endforeach
            @endif
        </tbody>
    </table>


@endsection