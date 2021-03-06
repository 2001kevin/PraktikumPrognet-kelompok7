
@extends('layouts.admin')
@section('content')
    <form action="/courier" method="POST">
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
                <h1>Master Courier</h1>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <label for="province">Courier</label>
                    <input type="text" class="form-control" id="price" name="courier" value="{{ old('courier') }}" placeholder="Add Courier">
                </div>
               
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a type="button" class="btn btn-primary" href="/courier">Back</a>
            </div>
        </div>
    </form>
@endsection
