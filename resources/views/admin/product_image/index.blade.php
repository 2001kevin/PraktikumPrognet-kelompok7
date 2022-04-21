@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <a type="button" class="btn btn-success mb-3 mt-3 rounded-pill " href="/discount/create">Add Discount</a>
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
        <table class="table table-striped table-hover " id="province">
            <thead>
              <tr>
                <th scope="col">NO.</th>
                <th scope="col">Product</th>
                <th scope="col">Product Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($product_image as $image )
              <tr>
                    <th scope="row">{{ $loop->index+1}}</th>
                    <td>{{ $image->product->product_name }}</td>
                    <td>{{ $image->image_name }}</td>
                    <td>
                  
                        <a type="button" class="btn btn-primary btn-sm rounded-pill" href="/proimage/{{ $image-> id }}">Details</a>
                        <a type="button" class="btn btn-warning btn-sm rounded-pill" href="/proimage/{{ $image-> id }}/edit">Edit</a>
                        <form action="/proimage/{{ $image -> id }}" method="POST" class="d-inline">
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
    @section('javascripts')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#province').DataTable();
    } );
    </script>
    @endsection
@endsection