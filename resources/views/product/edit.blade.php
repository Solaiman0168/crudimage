@extends('Product.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div class="pull-left">
                <h2>Edit product</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('product.index') }}">Back</a>
            </div>
        </div>
    </div>

    <form action="{{ url('update/product/'.$product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Code:</strong>
                    <input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Details:</label><br>
                    <textarea name="details" cols="60" rows="5">{{ $product->details }}</textarea>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Old Image:</strong>
                    <img src="{{ URL::to($product->logo ?? '') }}" width="100" height="100" alt="Product Image">
                    <input type="hidden" name="old_logo" value="{{ $product->logo ?? ''}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Image:</strong>
                    <input type="file" class="form-control" name="logo">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection