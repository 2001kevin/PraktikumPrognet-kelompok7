@extends('layouts.admin')
@section('content')

@foreach ($product_review as $review )
    <div class="card">
    <div class="card-header">
        Product Review on {{ $review->product->product_name }}
         @if ($review->rate == 5)
                                                    <span class="pull-right">
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                    </span>
                                                @elseif ($review->rate == 4)
                                                    <span class="pull-right">
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-muted"></i>
                                                    </span>
                                                @elseif ($review->rate == 3)
                                                    <span class="pull-right">
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-muted"></i>
                                                            <i class="fa fa-star fa-2x text-muted"></i>
                                                    </span>
                                                @elseif ($review->rate == 2)
                                                    <span class="pull-right">
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-muted"></i>
                                                            <i class="fa fa-star fa-2x text-muted"></i>
                                                            <i class="fa fa-star fa-2x text-muted"></i>
                                                    </span>
                                                @elseif ($review->rate == 1)
                                                    <span class="pull-right">
                                                            <i class="fa fa-star fa-2x text-primary"></i>
                                                            <i class="fa fa-star fa-2x text-muted"></i>
                                                            <i class="fa fa-star fa-2x text-muted"></i>
                                                            <i class="fa fa-star fa-2x text-muted"></i>
                                                            <i class="fa fa-star fa-2x text-muted"></i>
                                                    </span>
                                                @endif
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $review->user->name }}t</h5>
        <p class="card-text">{{ $review->content }}</p>
        
        <a href="/response/{{ $review->id }}" class="btn btn-primary">Reply this comment</a>
    </div>
    </div>
@endforeach
                        
@endsection