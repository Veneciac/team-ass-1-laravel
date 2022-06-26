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
        <a href="{{ route('products.create')}}" class="btn btn-primary btn-sm float-right">Create</a>
        <table class="table">
            <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Buy Price</td>
                <td>Sell Price</td>
                <td>Image</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($product as $products)
                <tr>
                    <td>{{$products->id}}</td>
                    <td>{{$products->name}}</td>
                    <td>{{$products->description}}</td>
                    <td>{{$products->price_buy}}</td>
                    <td>{{$products->price_sell}}</td>
                    <td><img src="{{ url('public/Image/'.$products->image) }}" style="height: 100px; width: 150px;"></td>
                    <td class="text-center">
                        <a href="{{ route('products.edit', $products->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $products->id)}}" method="post" style="display: inline-block">
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
