@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" value="{{$user->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" value="{{$user->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    @if (Auth::id() != $user->id)
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select name="type_id" id="types_list" class="form-control" required>
                                    <option value="" disabled selected>-- Select Type --</option>
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}" {{ old('type_id') == $type->id ? "selected" :""}}>{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Access Rights') }}</label>

                            <div class="col-md-6">
                                <select multiple data-live-search="true" name="access_ids[]" id="access_rights" class="form-control" required>
                                    
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Save Changes
                            </button>
                            <a href="{{route('users.index')}}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        var site_url = "{!! url("/admin") !!}"
        $(document).ready(function () {
        $('#types_list').change(function () {
            var type = $(this).val();
            $('#access_rights').find('option').not(':first').remove();

            $.ajax({
                url:`${site_url}/types/${type}/accessrights`,

                success:function (response) {
                    var len = 0;
                    if (response != null) {
                        len = response.length;
                    }
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                            var id = response[i]['id'];
                            var title = response[i]['access_title'];
                            var option = "<option value='"+id+"'>"+title+"</option>"; 
                            $("#access_rights").append(option);
                        }
                    }
                }
            });
        });
    });
    </script>
@endsection
