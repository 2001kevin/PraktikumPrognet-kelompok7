@extends('layouts.main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
@section('content')
    <form action="/proimage" method="POST" enctype="multipart/form-data">
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
                <h1>Master Product Image</h1>
            </div>
            <div class="card-body">
                <div class=" mb-3 mt-3 col-lg-8">
                    <label for="product_image" class="mb-3 fw-bold">Product Image :</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input type="file" class="form-control img-preview" id="product-image" name="image_name" value="{{ old('image_name', $product_image->image_name) }}" 
                       placeholder="Product Image" onchange="previewImage()">
                </div>
                <div class="col">
                    <label class="mb-2 fw-bold">Product Name : </label>
                    <select class="form-select mb-3" name="product_id" aria-label="Default select example">
                      <option selected>Pilih Product</option>
                            @foreach ($product as $pro => $product_name )
                                <option value="{{ $product_name }}">{{ $pro }}</option>
                            @endforeach
                    </select>
               </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a type="button" class="btn btn-primary" href="/proimage">Back</a>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function previewImage() {
          const image = document.querySelector('#product-image');
          const imgpreview = document.querySelector('.img-preview');
          imgpreview.style.display = 'block';
          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);
          oFReader.onload = function(oFREvent) {
            imgpreview.src = oFREvent.target.result;
          }
        }
    </script>
@endsection