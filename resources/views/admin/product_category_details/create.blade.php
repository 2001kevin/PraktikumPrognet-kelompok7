@extends('layouts.admin')

@section('content')
    <form action="/product_category_detail" method="POST">
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
                <h1>Details Product Category</h1>
            </div>
            <div class="card-body">
                <div class="col">
                    <label class="mb-2 fw-bold">Product Name : </label>
                    <select class="form-select mb-3" name="product_id" aria-label="Default select example">
                      <option selected>Pilih Product</option>
                            @foreach ($product as $pro => $product_name )
                                <option value="{{ $product_name }}">{{ $pro }}</option>
                            @endforeach
                    </select>
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
                    <a type="button" class="btn btn-primary" href="/product_category_detail">Back</a>
            </div>
        </div>
    </form>

@endsection