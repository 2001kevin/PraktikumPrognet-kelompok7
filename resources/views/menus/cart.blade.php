@extends('layouts.main')


@section('content')

<form method="post" action="#" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-9">
            @php
            $harga_static = 0;
            $i = 0;
            $array_harga = array();
            @endphp
            @foreach($keranjang as $keranjangs)
            <div class="card">
                @php
                $gambar = App\Models\product_image::where('product_id', '=', $keranjangs->product->id)->first();
                @endphp
                <div class="row g-0">
                    <div class="col-md-3">
                        <img class="img-fluid rounded-start" src="{{asset('storage/image'. $gambar->image_name)}}" style="height:200px;">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <a href="/detail/{{ $keranjangs->product->id }} ">
                                <h4 class="card-title">{{$keranjangs->product->product_name}}</h4>
                            </a>

                            @php
                            $tanggal = Carbon\Carbon::now()->format('Y-m-d');
                            $discount = App\Models\discount::where('product_id', '=', $keranjangs->product->id)->where('start', '<=', $tanggal)->where('end', '>=', $tanggal)->get();
                                $harga = $keranjangs->product->price;
                                if (count($discount) > 0) {
                                foreach ($discount as $discounts) {
                                $harga = $harga - ($harga * $discounts->percentage / 100);
                                }
                                }
                                $harga_static = $harga_static + ($harga * $keranjangs->qty);
                                array_push($array_harga, $harga);
                                @endphp

                                <div class="form-inline">
                                    <h5 class="card-subtitle mb-2 mt-2 text-muted">Rp.</h5>
                                    <h5 class="card-subtitle mb-2 mt-2 text-muted">{{$harga}}</h5>
                                    @if(count($discount)>0)
                                    <h5 class="card-subtitle mb-2 mt-2 ms-2 text-muted text-decoration-line-through">Rp.{{$keranjangs->book->price}}</h5>
                                    @endif
                                </div>


                                @if(count($discount)>0)
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Diskon&nbsp;&nbsp;:
                                    @foreach($discount as $discounts)
                                    @if($loop->index==0)
                                    <span>{{$discounts->percentage}}%</span>
                                    @else
                                    <span> + {{$discounts->percentage}}%</span>
                                    @endif
                                    @endforeach
                                </h6>
                                @endif

                                <div class="form-inline" style="float:right;">
                                    <input class="form-control form-control-lg" style="width:70px;" type="number" name="jumlah[]" value="{{$keranjangs->qty}}" id="jumlah{{$i}}" min="1" max="{{$keranjangs->book->stock}}" onkeyup="stock = '<?php echo $keranjangs->book->stock; ?>';  if(this.value<0){this.value= this.value * -1}else if(this.value==0){this.value = 1}else if(this.value > stock){this.value = stock}">
                                    <a type="button" class="btn btn-primary btn-icon btn-round ms-5" href="{{route('keranjang-hapus', $keranjangs->id)}}">
                                        <span class="material-icons-sharp text-white" style="margin-top:6px; vertical-align: middle; font-size:27px;">delete</span>
                                    </a>
                                </div>

                                @php
                                $i++;
                                
                                @endphp
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Harga</h4>
                    <div class="form-inline">
                        <h5 class="card-subtitle mb-2 mt-2 text-muted">Rp.</h5>
                        <h5 class="card-subtitle mb-2 mt-2 text-muted" id="total">{{$harga_static}}</h5>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Beli</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("input.form-control.form-control-lg").click(function() {
            var array_harga = <?php echo json_encode($array_harga, true); ?>;
            var total = 0;
            var indeks = 0;
            $("input.form-control.form-control-lg").each(function() {
                total = total + (array_harga[indeks] * $(this).val());
                indeks++;
            });
            $("#total").text(total);
        });
    });
</script>
@endsection