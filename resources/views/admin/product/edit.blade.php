@extends('layouts.admin')
@section('content')
    <form action="/product/{{ $product -> id }}" method="POST">
        @method('put')
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card mt-3 bg-light">
            <div class="card-header">
                <h1>Edit Product</h1>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <label for="province">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" placeholder="Product Name">
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <label for="province">Product Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="Product Price">
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <label for="province">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $product->description) }}" placeholder="Description">
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <label for="province">Product Rate</label>
                    <input type="text" class="form-control" id="product_rate" name="product_rate" value="{{ old('product_rate', $product->product_rate) }}" placeholder="Product Rate">
                </div>
                
                    <div class="form-floating mb-3 mt-3 col-lg-8">
                        <label for="province">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Stock">
                    </div>
                    <div class="form-floating mb-3 mt-3 col-lg-8">
                        <label for="province">Weight</label>
                        <input type="text" class="form-control" id="stock" name="weight" value="{{ old('weight', $product->weight) }}" placeholder="Weight">
                    </div>
               
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a type="button" class="btn btn-primary" href="/product">Back</a>
            </div>
        </div>
    </form>
@endsection