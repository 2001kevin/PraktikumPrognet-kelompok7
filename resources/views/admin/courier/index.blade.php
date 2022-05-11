@extends('layouts.admin')

@section('content')
    <a type="button" class="btn btn-success mb-3 mt-3 rounded-pill " href="/courier/create">Add Product Category</a>
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
        <h1>Category List</h1>
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover " id="province">
            <thead>
              <tr>
                <th scope="col">NO.</th>
                <th scope="col">Courier Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($courier as $co )
              <tr>
                    <th scope="row">{{ $loop->index+1}}</th>
                    <td>{{ $co->courier }}</td>
                    <td>
                  
                        <a type="button" class="btn btn-warning btn-sm rounded-pill" href="/courier/{{ $co->id }}/edit">Edit</a>
                        <form action="/courier/{{ $co -> id }}" method="POST" class="d-inline"  >
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
        $('#province').DataTable();
    } );
    </script>

@endsection