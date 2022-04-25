@extends('layouts.admin')
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
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}" placeholder="Product Name">
                    <label for="province">Product Name</label>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Product Price">
                    <label for="province">Product Price</label>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="Description">
                    <label for="province">Description</label>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <input type="text" class="form-control" id="product_rate" name="product_rate" value="{{ old('product_rate') }}" placeholder="Product Rate">
                    <label for="province">Product Rate</label>
                </div>
                
                    <div class="form-floating mb-3 mt-3 col-lg-8">
                        <input type="text" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" placeholder="Stock">
                        <label for="province">Stock</label>
                    </div>
                    <div class="form-floating mb-3 mt-3 col-lg-8">
                        <input type="text" class="form-control" id="stock" name="weight" value="{{ old('stock') }}" placeholder="Stock">
                        <label for="province">Weight</label>
                    </div>
                    <div class="col">
                        <label class="mb-2 fw-bold">Category Name : </label>
                        <select class="form-select mb-3" name="category_id" aria-label="Default select example">
                        <option selected>Pilih Category Product</option>
                                @foreach ($product_category as $cat => $category_name )
                                    <option value="{{ $category_name }}">{{ $cat }}</option>
                                @endforeach
                        </select>
                    </div>
               
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a type="button" class="btn btn-primary" href="/product">Back</a>
            </div>
        </div>
    </form>
@endsection