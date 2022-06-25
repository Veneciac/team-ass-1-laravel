@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
     -->
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product') }}</div>

                <div class="card-body">
                    <!-- TODO: change to action create product -->
                    <form >
                        @csrf

                        <div class="row mb-3">
                            <label for="product" class="col-md-4 col-form-label text-md-end">{{ __('Product') }}</label>

                            <div class="col-md-6">
                                <input id="product" type="product" class="form-control @error('product') is-invalid @enderror" name="product" value="{{ old('product') }}" required autocomplete="product" autofocus>

                                @error('product')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="buyingPrice" class="col-md-4 col-form-label text-md-end">{{ __('Buy Price') }}</label>

                            <div class="col-md-6">
                                <input id="buyingPrice" type="buyingPrice" class="form-control @error('buyingPrice') is-invalid @enderror" name="buyingPrice" value="{{ old('buyingPrice') }}" required autocomplete="buyingPrice" autofocus>

                                @error('buyingPrice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sellingPrice" class="col-md-4 col-form-label text-md-end">{{ __('Selling Price') }}</label>

                            <div class="col-md-6">
                                <input id="sellingPrice" type="sellingPrice" class="form-control @error('sellingPrice') is-invalid @enderror" name="sellingPrice" value="{{ old('sellingPrice') }}" required autocomplete="sellingPrice" autofocus>

                                @error('sellingPrice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="picture" class="col-md-4 col-form-label text-md-end">{{ __('Picture') }}</label>

                            <div class="col-md-6">
                                <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture" value="{{ old('picture') }}" required autocomplete="picture" autofocus>

                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                   

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
