@extends('layouts.admin')
@section('content')
    <a type="button" class="btn btn-success mb-3 mt-3 rounded-pill " href="/product/create">Add Product</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('deleted'))
        <div class="alert alert-danger">
        <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card bg-light">
      <div class="card-header">
        <h1>Product List</h1>
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover " id="datatable">
            <thead>
              <tr>
                <th scope="col">NO.</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Description</th>
                <th scope="col">Product Rate</th>
                <th scope="col">Product Stock</th>
                <th scope="col">Product Weight</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product )
              <tr>
                    <th scope="row">{{ $loop->index+1}}</th>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->product_rate }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->weight }}</td>
                    <td>
                  
                        <a type="button" class="btn btn-primary btn-sm rounded-pill" href="/product/{{ $product-> id }}">Details</a>
                        <a type="button" class="btn btn-warning btn-sm rounded-pill" href="/product/{{ $product-> id }}/edit">Edit</a>
                        <form action="/product/{{ $product -> id }}" method="POST" class="d-inline"  >
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Are you sure ?')">Delete</button>
                        </form>
                     
                </td>
              </tr>
                @endforeach
              </tbody>
            </table>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    } );
    </script>
    
@endsection