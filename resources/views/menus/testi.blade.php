@extends('layouts.main')

@section('content')
  <div class="design_section layout_padding">
    <div id="my_slider" class="carousel slide" data-ride="carousel">
        <h2 class="title-section">What do they say about us?</h2>
      </div>
      <div class="owl-carousel testimonial-carousel">
        <div class="card-testimonial">
          <div class="content">
            website ini sangat bagus! sangat membantu anak-anak saya saat belajar dirumah. terimakasih
          </div>
          <div class="author">
            <div class="avatar">
              <img src="../assets/img/person/person_1.jpg" alt="">
            </div>
            <div class="d-inline-block ml-2">
              <div class="author-name">Susanto</div>
              <div class="author-info">Orang Tua Pelajar</div>
            </div>
          </div>
        </div>

        <div class="card-testimonial">
          <div class="content">
            Sangat membantu proses belajar mengajar saya dirumah dengan para murid! semoga terus berkembang websitenya
          </div>
          <div class="author">
            <div class="avatar">
              <img src="../assets/img/person/person_2.jpg" alt="">
            </div>
            <div class="d-inline-block ml-2">
              <div class="author-name">Edison</div>
              <div class="author-info">Siswa SMA</div>
            </div>
          </div>
        </div>

        <div class="card-testimonial">
          <div class="content">
            bagus bangetttt! ngebantu banget aku buat pr! kadang suka lupa, tapi begitu liat disini jadi inget lagi
            materinya hehe
            <div class="author">
              <div class="avatar">
                <img src="../assets/img/person/person_3.jpg" alt="">
              </div>
              <div class="d-inline-block ml-2">
                <div class="author-name">Dewi Fortuna</div>
                <div class="author-info">Mahasiswi</div>
              </div>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .page-section -->
    @endsection