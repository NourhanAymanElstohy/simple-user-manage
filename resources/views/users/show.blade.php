@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    Username: {{$user->usename}} <br>
                    Email: {{$user->email}} <br>
                    Contact Number: {{$user->phone}} <br>
                    User Type: {{ $user->type->name }} <br>
                    Access Rights: 
                    <div class="text-center">
                        @foreach ($user->accessrights as $access)
                            {{$access->access_title}} <br>
                        @endforeach
                    </div>
                </div>
            </div>
            <a class="btn btn-sm btn-primary mt-3" href="{{route('users.index')}}">Back</a>
        </div>
    </div>
</div>
@endsection
