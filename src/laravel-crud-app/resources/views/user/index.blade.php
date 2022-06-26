@extends('layout')
@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>Name</td>
                <td>Place of Birth</td>
                <td>Date of Birth</td>
                <td>Gender</td>>
                <td>Email</td>
                <td>Password</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $users)
                <tr>
                    <td>{{$users->id}}</td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->place_of_birth}}</td>
                    <td>{{$users->date_of_birth}}</td>
                    <td>{{$users->gender}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->password}}</td>
                    <td class="text-center">
                        <a href="{{ route('users.edit', $users->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('users.destroy', $users->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection
