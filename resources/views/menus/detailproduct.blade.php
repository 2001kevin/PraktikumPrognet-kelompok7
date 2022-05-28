@extends('layouts.main')
@section('content')
<div class="container">
    <!-- product -->
    <div class="product-content product-wrap clearfix product-deatil mt-2">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="product-image">
                    <div id="myCarousel-2" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel-2" data-slide-to="0" class=""></li>
                            <li data-target="#myCarousel-2" data-slide-to="1" class="active"></li>
                            <li data-target="#myCarousel-2" data-slide-to="2" class=""></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            
                            @forelse ($products->product_image as $image)
                                <div class="item {{ $loop->iteration == 1 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/image/'. $image->image_name) }}" class="img-responsive" alt="" />
                                </div>
                            @empty
                                 <!-- Slide 1 -->
                                <div class="item active">
                                    <img src="{{ asset('storage/image/meja komputer.jpg') }}" class="img-responsive" alt="" />
                                </div>
                                <!-- Slide 2 -->
                                <div class="item">
                                    <img src="{{ asset('storage/image/meja komputer.jpg') }}" class="img-responsive" alt="" />
                                </div>
                                <!-- Slide 3 -->
                                <div class="item">
                                    <img src="{{ asset('storage/image/meja komputer.jpg') }}" class="img-responsive" alt="" />
                                </div>
                            @endforelse ($products->product_image as $image)
                        </div>
                        <a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                        <a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                <h2 class="name">
                    {{ $products -> product_name }}
                    <small>Product by <a href="javascript:void(0);">Adeline</a></small>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-muted"></i>
                    <span class="fa fa-2x"><h5>(109) Votes</h5></span>
                    <a href="javascript:void(0);">109 customer reviews</a>
                </h2>
                <hr />
                <h3 class="price-container">
                   IDR {{ number_format($products->price) }}
                    <small>*includes tax</small>
                </h3>
                <div class="certified">
                    <ul>
                        <li>
                            <a href="javascript:void(0);">Delivery time<span>7 Working Days</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Certified<span>Quality Assured</span></a>
                        </li>
                    </ul>
                </div>
                <hr />
                <div class="description description-tabs">
                    <ul id="myTab" class="nav nav-pills">
                        <li class="active"><a href="#more-information" data-toggle="tab" class="no-margin">Product Description </a></li>
                        <li class=""><a href="#specifications" data-toggle="tab">Specifications</a></li>
                        <li class=""><a href="#reviews" data-toggle="tab">Reviews</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="more-information">
                            <br />
                            <strong>Product Description</strong>
                            <p>
                                {{ $products->description }}
                            </p>
                        </div>
                        <div class="tab-pane fade" id="specifications">
                            <br />
                            <dl class="">
                                <dt>Gravina</dt>
                                <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                <dd>Eget lacinia odio sem nec elit.</dd>
                                <br />

                                <dt>Test lists</dt>
                                <dd>A description list is perfect for defining terms.</dd>
                                <br />

                                <dt>Altra porta</dt>
                                <dd>Vestibulum id ligula porta felis euismod semper</dd>
                            </dl>
                        </div>
                        <div class="tab-pane fade" id="reviews">
                            <br />
                            <form method="post" action="/product/review" class="well padding-bottom-10" >
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $products -> id }}">
                                <textarea rows="2" class="form-control" name ='content' placeholder="Write a review"></textarea>
                                <input type ="number" class="mt-2" min="1" max="5" name="rate" placeholder="Rate">
                               
                                    <button type="submit" class="btn btn-sm btn-primary pull-right mt-2">
                                        Submit Review
                                    </button>

                                <div class="margin-top-10">
                                    <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Location"><i class="fa fa-location-arrow"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Voice"><i class="fa fa-microphone"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Photo"><i class="fa fa-camera"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add File"><i class="fa fa-file"></i></a>
                                </div>
                            </form>
                            <div class="chat-body no-padding profile-message">
                                <ul>
                                    @foreach ($products->product_review as $review)
                                        
                                    <li class="message">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="online" />
                                        <span class="message-text">
                                            <a href="javascript:void(0);" class="username">
                                                {{ $review->user->name }}
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
                                            </a>
                                            {{ $review->content }}
                                        </span>
                                        <ul class="list-inline font-xs">
                                            <li>
                                                @auth('admin')
                                                   <a href="javascript:void(0);" class="text-info"><i class="fa fa-thumbs-up"></i> Reply this comment</a>
                                                @endauth
                                               
                                            </li>
                                            <li class="pull-right">
                                                <small class="text-muted pull-right ultra-light"> {{ $review->created_at }} </small>
                                            </li>
                                        </ul>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @auth
                    
                <hr />
                jumlah pesan <input type="number" id="jumlah" class="form form-control" value="1" max="{{$products->stock}}" min="1" onkeyup="stock = '<?php echo $products->stock; ?>';   if(this.value<0){this.value= this.value * -1}else if(this.value==0){this.value = 1}else if(this.value > stock){this.value = stock}">
                <h6 class="card-subtitle mb-2 mt-2 text-muted">Sub Totaln : Rp. <span id="subtotal">
                    @if(!empty($discount))
                        {{ $harga }}
                    @else
                        {{ $products->price }}
                    @endif
                </span></h6>
                <div class="row" mt-3>
                    <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                        <form action="/beli-langsung/{{$products->id}}/" method="get" enctype="multipart/form-data">
                            @csrf
                                <input type="number" class="form form-control"  value="1" id="keranjang" name="jumlah_beli" hidden> 
                                <button type="submit" class="btn btn-primary" style="font-size:12" >Buy Now</button>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mt-3">
                        <form action="/cart-adds/{{$products->id}}/" method="get" enctype="multipart/form-data">
                            @csrf
                                <input type="number" class="form form-control" id="beli" value="1" name="jumlah_keranjang" hidden> 
                                <button type="submit" class="btn btn-success" style="font-size:12">Add Cart</button>
                        </form>
                    </div>
                        <!-- <a href="javascript:void(0);" class="btn btn-success btn-lg">Add to cart (IDR {{number_format($products->price) }})</a> -->
                </div>
                @endauth
                @if(!empty($discount))
                    @php
                        $harga_fix =$harga;
                    @endphp
                
                @else
                    @php
                        $harga_fix=$products->price;
                    @endphp
                @endif
                <!-- <div class="row mt-3">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <form action="" method="post">
                            <input type="number" class="form form-control" id="jumlah" name="jumlah" hidden> 
                            <button type="submit" class="btn btn-primary">add cart</button>
                        </form>
                        <!-- <a href="javascript:void(0);" class="btn btn-success btn-lg">Add to cart (IDR {{number_format($products->price) }})</a> -->
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <!-- end product -->
</div>

@auth('web')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var jumlah = "jumlah";
        var harga ="<?php echo $harga_fix; ?>"
        $("#" + jumlah).change(function() {
            var hasil = harga * $("#jumlah").val();
            $("#subtotal").text(hasil);
            $("#keranjang").val($("#jumlah").val());
            $("#beli").val($("#jumlah").val());
        });
    });
</script>
@endauth
@endsection