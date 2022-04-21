@extends('layouts.main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
@section('content')
    <form action="/categorydetail" method="POST">
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
                    <select class="form-select mb-3" name="product_id" aria-label="Default select example">
                      <option selected>Pilih Product</option>
                            @foreach ($product_category as $cat => $category_name )
                                <option value="{{ $category_name }}">{{ $cat }}</option>
                            @endforeach
                    </select>
               </div>
                
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a type="button" class="btn btn-primary" href="/categorydetail">Back</a>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@endsection