@extends('Product.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div class="pull-left">
                <h2>Laravel product list</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('product.create') }}">Create new product</a>
            </div>
        </div>
        
        @if($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Product code</th>
                    <th>Details</th>
                    <th>Product Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->product_code }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->details, 10, '...') }}</td>
                        <td><img src="{{ URL::to($item->logo ?? '') }}" width="100" height="100" alt="Product Image"></td>
                        <td>
                            <a class="btn btn-success" href="{{ URL::to('show/product/'.$item->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ URL::to('edit/product/'.$item->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ URL::to('delete/product/'.$item->id) }}" onclick="return confirm('Are you sure to delete this product?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $product->links() !!}
    </div>

@endsection