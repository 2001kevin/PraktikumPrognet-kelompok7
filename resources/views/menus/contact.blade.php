@extends('layouts.main')

@section('content')
<main>
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
{{-- <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script> --}}