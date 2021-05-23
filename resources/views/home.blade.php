@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Management') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome to User Management system
                    Your Access Rights are: <br>
                    <div class="text-center">
                        @foreach (Auth::user()->accessrights as $access)
                            {{$access->access_title}} <br>
                        @endforeach
                    </div>
                    <div>Go to <a class="btn btn-sm btn-primary " href="{{route('users.index')}}">Users Page</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
