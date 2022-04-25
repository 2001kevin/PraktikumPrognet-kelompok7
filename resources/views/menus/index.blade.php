@extends('layouts.main')

@section('content')
<div class="banner_section layout_padding">
   <div id="main_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <h1 class="banner_taital">Best <br> Design <br>of Furnitur</h1>
                     <p class="banner_text">It is a long established fact that a reader will bedistracted by the readable content of </p>
                     <div class="btn_main">
                        <div class="contact_bt"><a href="#">Contact US</a></div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="image_1"><img src="/images/img-1.png"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <h1 class="banner_taital">Best <br> Design <br>of Furnitur</h1>
                     <p class="banner_text">It is a long established fact that a reader will bedistracted by the readable content of </p>
                     <div class="btn_main">
                        <div class="contact_bt"><a href="#">Contact US</a></div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="image_1"><img src="/images/img-1.png"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <h1 class="banner_taital">Best <br> Design <br>of Furnitur</h1>
                     <p class="banner_text">It is a long established fact that a reader will bedistracted by the readable content of </p>
                     <div class="btn_main">
                        <div class="contact_bt"><a href="#">Contact US</a></div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="image_1"><img src="/images/img-1.png"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
      <i style="font-style: initial;">01</i>
      </a>
      <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
      <i style="font-style: initial;">02</i>
      </a>
   </div>
</div>
<!-- banner section end -->
<!-- about section start -->
<div class="about_section layout_padding">
   <div class="container">
      <div class="about_section_2">
         <div class="row">
            <div class="col-md-6">
               <div class="image_2"><img src="/images/img-2.png"></div>
            </div>
            <div class="col-md-6">
               <h1 class="about_taital">About Us</h1>
               <p class="about_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised </p>
               <div class="readmore_bt"><a href="#">Read More</a></div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- about section end -->
<!--  design section start -->
<div class="design_section layout_padding">
   <div id="my_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container">
               <h1 class="design_taital">Our Work Furniture</h1>
               <p class="design_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteratio</p>
               <div class="design_section_2">
                  <div class="row">
                     <div class="card " style="width: 18rem;">
                        <div class="card-header">
                           Categories
                        </div>
                        <ul class="list-group list-group-flush">
                          
                              @foreach ($product_category as $cat )
                                 
                              <li class="list-group-item"><a href="/viewcategory/{{ $cat ->id }}">{{ $cat->category_name }}</a></li>                            
                              @endforeach
                           
                        </ul>
                     </div>
                     @forelse ($product as $pro )
                        <div class="col-md-4">
                           <div class="box_main">
                                 <p class="chair_text">{{ $pro->product_name }}</p>
                                 @foreach ($pro -> product_image as $image)
                                   <div class="image_3" href="#"><img src="{{ asset('storage/'. $image->image_name) }}"></div>
                                 @endforeach
                                 <p class="chair_text">IDR {{ $pro->price }}</p>
                                 <div class="buy_bt"><a href="#">Buy Now</a></div>
                              </div>
                           </div>
                     @empty
                        <h1>No Product Added</h1>
                     @endforelse ($product_image as $pro )
                     </div>
                  </div>
            </div>
         </div>
      </div>
      <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
      <i class="fa fa-long-arrow-left" style="font-size:24px"></i>
      </a>
      <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
      <i class="fa fa-long-arrow-right" style="font-size:24px"></i>
      </a>
   </div>
   <div class="container">
      <div class="read_bt"><a href="#">Read More</a></div>
   </div>
</div>
<!--  design section end -->
<!-- contact section start -->
<div class="contact_section layout_padding">
   <div class="container">
      <div class="contact_section_2">
         <div class="row">
            <div class="col-md-6">
               <div class="mail_section_1">
                  <h1 class="contact_taital">Contact Us</h1>
                  <input type="text" class="mail_text" placeholder="Name" name="text">
                  <input type="text" class="mail_text" placeholder="Email" name="text">
                  <input type="text" class="mail_text" placeholder="Phone Number" name="text">
                  <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                  <div class="send_bt"><a href="#">SEND</a></div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="map_main">
                  <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.8701570606577!2d115.17020341381624!3d-8.798267392377383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244bc39fb3da7%3A0x6cae8cb2a990cae5!2sUniversitas%20Udayana!5e0!3m2!1sid!2sid!4v1637737022847!5m2!1sid!2sid" width="600" height="360" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- contact section end -->
@endsection