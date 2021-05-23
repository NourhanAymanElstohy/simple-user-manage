@extends('layouts.app')
@section('content')
    <div class="container">
        @include('status.success')
        @include('status.error')
        <div class="row mb-3 mt-3">
            <a class="btn btn-sm btn-success" href="{{route('users.create')}}">Create User</a>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Conact Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Access rights</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row">{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->status }}</td>
                            <td>{{ $user->type->name }}</td>
                            <td>{{ $user->accessrights[0]->access_title }}, ...</td>
                            <td style="width: 20%">
                                <a class="btn btn-sm btn-primary" href="{{route('users.show', ['user' => $user->id])}}">Show</a>
                                @if (Auth::user()->type->name == 'admin' || $user->id == Auth::id())    
                                    <a href="{{route('users.edit',['user' => $user->id])}}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                @else
                                    <a class="btn btn-sm btn-dark">Edit</a>
                                @endif
                                @if (Auth::user()->type->name == 'admin')
                                    @if ($user->id == Auth::id())
                                        <a onclick="return alert('you can not delete yourself')" class="btn btn-sm btn-dark">Delete</a>
                                    @else
                                        <form method="POST" action="{{route('users.destroy',['user' => $user->id])}}"
                                            class="float-right">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm ('are you sure?')">Delete</button>
                                        </form>
                                    @endif
                                @else
                                    <a class="btn btn-sm btn-dark">Delete</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    {{$users->links()}}
                </tbody>
            </table>
        </div>
    </div>
@endsection