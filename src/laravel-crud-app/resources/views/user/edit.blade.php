@extends('layout')
@section('content')
    <style>
        .container {
            max-width: 450px;
        }
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="card push-top">
        <div class="card-header">
            Edit & Update
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('users.update', $user->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
                </div>
                <div class="form-group">
                    <label for="place_of_birth">Place of birth</label>
                    <input type="text" class="form-control" name="place_of_birth" value="{{ $user->place_of_birth }}"/>
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of birth</label>
                    <input type="date" class="form-control" name="date_of_birth" value="{{ $user->date_of_birth }}"/>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                    <div class="form-check form-check-inline">
                        @foreach(["male" => "Male", "female" => "Female"] AS $gender => $genderLabel)
                            <input class="form-check-input" type="radio" name="gender" id="{{ $gender }}" value="{{ $gender }}" {{ $user->gender == $gender ? "checked" : "" }}>
                            <label class="form-check-label" for="{{ $gender }}">{{ $genderLabel }}</label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}"/>
                </div>
{{--                <div class="form-group">--}}
{{--                    <label for="password">Password</label>--}}
{{--                    <input type="text" class="form-control" name="password" value="{{ $user->password }}"/>--}}
{{--                </div>--}}
                <button type="submit" class="btn btn-block btn-danger">Update User</button>
            </form>
        </div>
    </div>
@endsection
