@extends('layouts.admin')
@section('content')
    <form action="/discount/{{ $discount -> id }}" method="POST">
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
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <input type="text" class="form-control" id="price" name="percentage" value="{{ old('percentage') }}" placeholder="Product Percentage">
                    <label for="province">Product Percentage</label>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="Description">
                    <label for="province">Description</label>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <input type="date" class="form-control" id="product_rate" name="start" value="{{ old('start') }}" placeholder="Product Rate">
                    <label for="province">Start Discount</label>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <input type="date" class="form-control" id="product_rate" name="end" value="{{ old('end') }}" placeholder="Product Rate">
                    <label for="province">Start Discount</label>
                </div>
                
               
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a type="button" class="btn btn-primary" href="/discount">Back</a>
            </div>
        </div>
    </form>

@endsection