@extends('layouts.admin')
@section('content')
    <form action="/category" method="POST">
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
                <h1>Master Product Category</h1>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <input type="text" class="form-control" id="price" name="category_name" value="{{ old('category_name') }}" placeholder="Product Category">
                    <label for="province">Product Category</label>
                </div>
                
               
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a type="button" class="btn btn-primary" href="/category">Back</a>
            </div>
        </div>
    </form>
@endsection