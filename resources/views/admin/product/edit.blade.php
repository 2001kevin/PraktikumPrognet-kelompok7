@extends('layouts.main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
@section('content')
    <form action="/product" method="POST">
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
                <h1>Master Product</h1>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" placeholder="Product Name">
                    <label for="province">Product Name</label>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="Product Price">
                    <label for="province">Product Price</label>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $product->description) }}" placeholder="Description">
                    <label for="province">Description</label>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <input type="text" class="form-control" id="product_rate" name="product_rate" value="{{ old('product_rate', $product->product_rate) }}" placeholder="Product Rate">
                    <label for="province">Product Rate</label>
                </div>
                
                    <div class="form-floating mb-3 mt-3 col-lg-8">
                        <input type="text" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Stock">
                        <label for="province">Stock</label>
                    </div>
                    <div class="form-floating mb-3 mt-3 col-lg-8">
                        <input type="text" class="form-control" id="stock" name="weight" value="{{ old('weight', $product->weight) }}" placeholder="Weight">
                        <label for="province">Weight</label>
                    </div>
               
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a type="button" class="btn btn-primary" href="/product">Back</a>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@endsection