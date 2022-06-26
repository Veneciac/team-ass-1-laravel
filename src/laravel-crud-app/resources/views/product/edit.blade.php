@extends('layout')
@section('content')
    <style>
        .container {
            max-width: 450px;
        }
        .push-top {
            margin-top: 10px;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-auto">
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
                        <form method="post" action="{{ route('products.update', $product->id) }}"  enctype="multipart/form-data">
                            <div class="form-group">
                                @csrf
                                @method('PATCH')
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" rows="3">{!! nl2br($product->description) !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price_buy">Purchase Price</label>
                                <input type="number" min="0" step="1" name="price_buy" value="{{ $product->price_buy }}"/>
                            </div>
                            <div class="form-group">
                                <label for="price_sell">Selling Price</label>
                                <input type="number" min="0" step="1" name="price_sell" value="{{ $product->price_sell }}"/>
                            </div>
                            <div class="image">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" required id="image" name="image" value="{{ $product->image }}">
                                @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <img id="preview-image-before-upload" img src="{{ url('public/Image/'.$product->image) }}"
                                     alt="preview image" style="max-height: 250px;">
                            </div>
                            <button type="submit" class="btn btn-block btn-danger">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
