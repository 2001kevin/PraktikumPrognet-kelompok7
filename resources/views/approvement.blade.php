@extends('layouts.admin')
@section('content')
@foreach($transactions as $transaction)
    <div class="card">
        <div class="card-header">
            <h1>Approvement Transaksi</h1>
        </div>
        <div class="card-body">
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <label for="province">Address</label>
                    <input type="text" class="form-control" id="price" name="courier" value="{{ $transaction->address }}" placeholder="Product Category"readonly>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <label for="province">Kabupaten/Kota</label>
                    <input type="text" class="form-control" id="price" name="courier" value="{{ $transaction->regency }}" placeholder="Product Category"readonly>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <label for="province">Province</label>
                    <input type="text" class="form-control" id="price" name="courier" value="{{ $transaction->province }}" placeholder="Product Category"readonly>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <label for="province">Shipping Cost</label>
                    <input type="text" class="form-control" id="price" name="courier" value="{{ $transaction->shipping_cost }}" placeholder="Product Category"readonly>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <label for="province">Sub Total</label>
                    <input type="text" class="form-control" id="price" name="courier" value="{{ $transaction->sub_total }}" placeholder="Product Category" readonly>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <label for="province">Total</label>
                    <input type="text" class="form-control" id="price" name="courier" value="{{ $transaction->total }}" placeholder="Product Category"readonly>
                </div>
                <div class="form-floating mb-3 mt-3 col-lg-8">
                    <label for="province">Status</label>
                    <input type="text" class="form-control" id="price" name="courier" value="{{ $transaction->status }}" placeholder="Product Category"readonly>
                </div>
                @if($transaction->proof_of_payment == null)
                    <h1>User belum mengirim bukti pembayaran</h1>
                @else
                <form class="d-grid" method="post" action="/admin-transaksi-status/{{ $transaction->id }}" >
                    @csrf
                    <!-- @method('put') -->
                    <div class="form-group">
                        <label>Ubah Status</label>
                        <select class="form-control" name="status" required>
                            <option selected value="">Pilih Status</option>
                            <option value="menunggu verifikasi">Menunggu Verifikasi</option>
                            <option value="sudah terverifikasi">Sudah Terverifikasi</option>
                            <option value="transaksi dibatalkan">Transaksi Dibatalkan</option>
                            <option value="barang dalam pengiriman">Barang Dalam Pengiriman</option>
                            <option value="barang telah sampai di tujuan">Barang Telah Sampai Di Tujuan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                @endif
            </div>
        </div>
@endforeach
@endsection