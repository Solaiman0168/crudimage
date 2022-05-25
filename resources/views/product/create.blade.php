@extends('Product.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div class="pull-left">
                <h2>Add new product</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('product.index') }}">Back</a>
            </div>
        </div>
    </div>

    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Code:</strong>
                    <input type="text" class="form-control" name="product_code" placeholder="Product Code">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Details:</label><br>
                    <textarea name="details" cols="60" rows="5" placeholder="Type Something"></textarea>
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