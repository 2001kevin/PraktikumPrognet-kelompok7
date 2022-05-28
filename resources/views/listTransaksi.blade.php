@extends('layouts.main')
@section('content')
    @foreach($transaction as $transactions)
    {{-- <a href="{{route('transaksi-detail', $transactions->id)}}"> --}}
    <a href="#">
        <div class="card mt-3 mb-3">
            <div class="card-header">
                <h1>Transaksiku</h1>
            </div>
            <div class="card-body">
                <h4 class="card-title">{{$transactions->status}}</h4>
                <h6 class="card-subtitle mb-3 mt-2 text-muted">Tanggal&nbsp;:&nbsp;{{$transactions->created_at->format('Y-m-d')}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Rp.{{number_format($transactions->total)}}</h6>
                @if($transactions->status == "menunggu bukti pembayaran")
                <div class="form-inline">
                <p class="card-text">Countdown&nbsp;:&nbsp;{{$transactions->timeout}}</p>
                    {{-- <p class="card-text">Countdown&nbsp;:&nbsp;{{$interval[$loop->index]}}</p> --}}
                </div>
                @endif
            </div>
        </div>
    </a>
    @endforeach
@endsection

