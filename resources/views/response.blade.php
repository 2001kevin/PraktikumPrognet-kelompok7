@extends('layouts.admin')
@section('content')

<div class="card">
  <h5 class="card-header">Product Review on {{ $product_review->product->product_name }}</h5>
  <div class="card-body">
    <h5 class="card-title">{{ $product_review->user->name }}</h5>
    <p class="card-text">{{ $product_review->content }}</p>
    <form method="post" action="/review/response" class="well padding-bottom-10" >
        @csrf
        <input type="hidden" name="review_id" value="{{ $product_review -> id }}">
        <textarea rows="2" class="form-control mb-3" name ='content' placeholder="Reply this review"></textarea>
        <button type="submit" class="btn btn-primary ">
            Reply
        </button>
    </form>
  </div>
</div>

                        
@endsection