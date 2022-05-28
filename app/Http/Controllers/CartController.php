<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\product;
use App\Models\courier;
use App\Models\Admin;
use App\Models\user;
use App\Models\discount;
use App\Models\transaction;
use App\Models\transaction_detail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function keranjang()
    {
        $user_id = Auth()->user()->id;
        $keranjang = cart::where('user_id', '=', $user_id)->where('status', '=', 'aktif')->get();
        return redirect()->back();
        // return view('menus.detailproduct', compact('keranjang'));
    }

    public function keranjang_tambah($id, Request $request)
    {
        
        $user_id = Auth()->user()->id;
        $cart = Cart::where('user_id', '=', $user_id)->where('product_id', '=', $id)->where('status', '=', 'aktif')->get();
        $product_stock = product::where('id',$id)->first();
      
        if(count($cart) > 0) {
            foreach ($cart as $carts){
                if($product_stock->stock == $carts->qty){
                    dd('tes');
                    $carts->qty = $carts->qty + 0;
                    $carts->save();
                }else if($product_stock->stock < $carts->qty + $request->jumlah_keranjang){
                    dd('tes=');
                    $k = $carts->qty;
                    $jumlah = $product_stock->stock - $k;
                    $carts->qty = $carts->qty + $jumlah;
                    $carts->save();
                }else{
                    // dd('tegsgshs');
                    $carts->qty = $carts->qty + $request->jumlah_keranjang;
                    $carts->save();
                }
            }
        }else {
            $insert_cart = array(
                'user_id' => $user_id,
                'product_id' => $id,
                'qty' => $request->jumlah_keranjang,
                'status' => 'aktif'
            );
            cart::create($insert_cart);
        }
        return redirect()->back();
    }

    public function cartindex(){
        $keranjang = cart::all();
        return view('menus.cart',compact('keranjang'));
    }

    public function beli_langsung($id, Request $request){
        //dd('aaa');
        $jumlah = $request->jumlah_beli;
        $user_id = Auth()->user()->id;
        $kurir = courier::all();
        $i = 0;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 400f496a78d8de8e403cb03633e42774"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        $province = json_decode($response, true);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 400f496a78d8de8e403cb03633e42774"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        $city = json_decode($response, true);
        return view('beli-alamat', compact('province', 'city', 'kurir', 'id', 'jumlah'));
    }

    public function beli_checkout($id, $jumlah, Request $request){
        //dd('tes');
        $validatedData = $request->validate([
            'province' => 'required|min:1',
            'regency' => 'required|min:1',
            'address' => 'required|min:1',
            'courier_id' => 'required|min:1'
        ]);

        $user_id = Auth()->user()->id;
        $product = product::find($id);
        $kurir = courier::find($request->courier_id);

        list($province, $province_name) = explode('|', $request->province);
        list($regency, $regency_name) = explode('|', $request->regency);
        $address = $request->address;

        $keranjang = cart::where('user_id', '=', $user_id)->where('status', '=', 'aktif')->get();
     
        $subtotal = 0;
        $tanggal = Carbon::now('Asia/Makassar')->format('Y-m-d');
        $diskon = discount::where('product_id', '=', $product->id)->where('start', '<=', $tanggal)->where('end', '>=', $tanggal)->orderBy('id', 'DESC')->get();
        if (count($diskon) > 0) {
            foreach ($diskon as $diskons) {
                $discount = $diskons->percentage;
                break;
            }
            $selling_price = $product->price * $discount / 100;
        } else {
            $discount = 0;
            $selling_price = $product->price;
        }
        $weight = $product->weight * $jumlah * 1000;
        $subtotal = $jumlah * $selling_price;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$request->province."&destination=" . $request->regency . "&weight=" . $weight . "&courier=" . $kurir->courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 400f496a78d8de8e403cb03633e42774"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $cost = json_decode($response, true);
        
        // return $cost;
        foreach ($cost["rajaongkir"]["results"] as $costs) {
            foreach ($costs["costs"] as $costss) {
                foreach ($costss["cost"] as $costsss) {
                    $shipping_cost = $costsss["value"];
                    break;
                }
                break;
            }
            break;
        }

        $total = $shipping_cost + $subtotal;
        return view('beli-checkout', compact('product','jumlah', 'kurir', 'subtotal', 'discount', 'selling_price', 'province_name', 'regency_name', 'address', 'shipping_cost', 'total'));
    }

    public function beli_bayar($id, $jumlah, Request $request)
    {

        $user_id = Auth()->user()->id;
        $courier = courier::where('courier', '=', $request->courier)->first();
        $timeout = Carbon::now('Asia/Makassar');
        $timeout->addDays(1);
        $timeout->format('Y-m-d H:i:s');
        $transaksi = array(
            'user_id' => $user_id,
            'courier_id' => $courier->id,
            'timeout' => $timeout,
            'address' => $request->alamat,
            'regency' => $request->regency,
            'province' => $request->province,
            'total' => $request->total,
            'shipping_cost' => $request->shipping_cost,
            'sub_total' => $request->subtotal,
            'status' => "menunggu bukti pembayaran",
        );
        transaction::create($transaksi);

        $transaction = transaction::where('user_id', '=', $user_id)->where('total', '=', $request->total)->latest()->first();

        $transaksi_detail = array(
            'transaction_id' => $transaction->id,
            'product_id' => $id,
            'qty' => $jumlah,
            'discount' => $request->discount,
            'selling_price' => $request->selling_price,
        );
        transaction_detail::create($transaksi_detail);

        $data =product::where('id',$id)->first();
       
        // $product =  DB::Table('products')->where('id',$id)->first();
        // $data = $product->stock - $jumlah;

        // $s = product::find($id);
        // $s->stock = $data;
        // $s->save();
        

        // $admin = admin::all();

        // foreach($admin as $a)
        
        
        //$transaction_detail = transaction_detail::where('transaction_id', '=', $transaction->id)->latest()->first();
        return redirect()->route('client.transaksi-detail',$transaction->id);
    }

    public function transaksi_detail($id)
    {
    
        $transaction = transaction::where('id',$id)->first();
        $transaction_detail = transaction_detail::where('transaction_id', $id)->latest()->get();

        $transaction_detail_id = transaction_detail::where('transaction_id', $id)->first();

        $keranjang = cart::where('user_id',auth()->user()->id)->where('status','aktif')->get();
        foreach($keranjang as $k){
            $keranjang = cart::find($k->id);
            $keranjang->status="hapus";
            $keranjang->update();
        }

        $tanggal = Carbon::now('Asia/Makassar');
        
        if ($transaction->status == "menunggu bukti pembayaran" && $transaction->timeout < $tanggal) {
            $transaction->status = "transaksi expired";
            $transaction->save();

            $transaction_detail = transaction_detail::where('transaction_id', '=', $id)->get();
            foreach ($transaction_detail as $transaction_details) {
                $product = product::find($transaction_details->product_id);
                $product->stock = $product->stock + $transaction_details->qty;
                $product->save();
            }

            return view('transaksi-detail', compact('transaction', 'transaction_detail'));
        } else if ($transaction->status == "menunggu bukti pembayaran" && $transaction->timeout >= $tanggal) {
            
            $date = Carbon::createFromFormat('Y-m-d H:s:i', $transaction->timeout);
            $interval = $tanggal->diffAsCarbonInterval($date);
            
            return view('transaksi-detail', compact('transaction', 'interval', 'transaction_detail'));
        } else {
         
            return view('transaksi-detail', compact('transaction', 'transaction_detail'));
        }
    }

    public function keranjang_alamat(Request $request)
    {
        $user_id = Auth()->user()->id;
        $keranjang = cart::where('user_id', '=', $user_id)->where('status', '=', 'aktif')->get();
        $kurir = courier::all();
        $i = 0;
        foreach ($keranjang as $keranjangs) {
            $keranjangs->qty = $request->jumlah[$i];
            $keranjangs->save();
            $i++;
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 400f496a78d8de8e403cb03633e42774"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        $province = json_decode($response, true);
        // foreach ($province["rajaongkir"]["results"] as $provinces) {
        //     return $provinces["province_id"];
        // }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 400f496a78d8de8e403cb03633e42774"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        $city = json_decode($response, true);
        return view('keranjang-alamat', compact('province', 'city', 'kurir'));
    }

    public function keranjang_checkout(Request $request)
    {
     
        $validatedData = $request->validate([
            'province' => 'required|min:1',
            'regency' => 'required|min:1',
            'address' => 'required|min:1',
            'courier_id' => 'required|min:1'
        ]);

        $user_id = Auth()->user()->id;
        $keranjang = cart::where('user_id', '=', $user_id)->where('status', '=', 'aktif')->get();
        $kurir = courier::find($request->courier_id);

        list($province, $province_name) = explode('|', $request->province);
        list($regency, $regency_name) = explode('|', $request->regency);
        $address = $request->address;

        $discount =  array();
        $selling_price = array();

        $keranjang = cart::where('user_id', '=', $user_id)->where('status', '=', 'aktif')->get();
        $subtotal = 0;
        $weight = 0;
        $tanggal = Carbon::now('Asia/Makassar')->format('Y-m-d');
        foreach ($keranjang as $keranjangs) {
            $weight = $weight + ($keranjangs->qty * $keranjangs->product->weight * 1000);
            $diskon = discount::where('product_id', '=', $keranjangs->product_id)->where('start', '<=', $tanggal)->where('end', '>=', $tanggal)->get();
            if (count($diskon) > 0) {
                $harga = $diskon[0]->percentage * $keranjangs->product->price / 100;
                $subtotal = $subtotal + ($keranjangs->qty * $harga);
                array_push($discount, $diskon[0]->percentage);
                array_push($selling_price, $harga);
            } else{
                $subtotal = $subtotal + ($keranjangs->qty * $keranjangs->product->price);
                array_push($discount, 0);
                array_push($selling_price, $keranjangs->product->price);
            }
        }


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$request->province."&destination=" . $request->regency . "&weight=" . $weight . "&courier=" . $kurir->courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 400f496a78d8de8e403cb03633e42774"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $cost = json_decode($response, true);
        
        // return $cost;
        foreach ($cost["rajaongkir"]["results"] as $costs) {
            foreach ($costs["costs"] as $costss) {
                foreach ($costss["cost"] as $costsss) {
                    $shipping_cost = $costsss["value"];
                    break;
                }
                break;
            }
            break;
        }
    
        $total = $shipping_cost + $subtotal;
        return view('keranjang-checkout', compact('keranjang', 'kurir', 'subtotal', 'discount', 'selling_price', 'province_name', 'regency_name', 'address', 'shipping_cost', 'total'));
    }

    public function transaksi_bukti($id, Request $request)
    {

        $validatedData = $request->validate([
            'proof_of_payment' => 'required|file|image|max:8192'
        ]);
        $transaction = transaction::find($id);

        $tanggal = Carbon::now('Asia/Makassar');
        if ($transaction->status == "menunggu bukti pembayaran" && $transaction->timeout < $tanggal) {
            $transaction->status = "transaksi expired";
            $transaction->save();

            $transaction_detail = transaction_detail::where('transaction_id', '=', $id)->get();
            foreach ($transaction_detail as $transaction_details) {
                $book = product::find($transaction_details->product_id);
                $book->stock = $book->stock + $transaction_details->qty;
                $book->save();
            }
         

           
           return redirect()->back();

        }

        $image = $request->file('proof_of_payment');
        $image_name = rand() . "." . $image->getClientOriginalExtension();

        $transaction->proof_of_payment = $image_name;
        $transaction->status = "menunggu verifikasi";
        $transaction->save();

      

        $image->move(public_path('proof_of_payment'), $image_name);

        return redirect()->back();
    }

    public function transaksi_batal($id)
    {
        $transaction = transaction::find($id);
        $transaction->status = "transaksi dibatalkan";
        $transaction->save();

        $transaction_detail = transaction_detail::where('transaction_id', '=', $id)->get();
        foreach ($transaction_detail as $transaction_details) {
            $book = product::find($transaction_details->book_id);
            $book->stock = $book->stock + $transaction_details->qty;
            $book->save();
        }

        //notif admin---------------------------------------
        $user = auth::user();
        //$user_data=User::find($user->id);
        $admin = Admin::find(3);
        $data = [
           'nama'=> $user->name,
           'message'=>'Transaksi Dibatalkan!',
           'id'=> $id,
           'category' => 'canceled'
       ];
       $data_encode = json_encode($data);
       $admin->createNotif($data_encode);
       //notif admin---------------------------------------

        //notif user---------------------------------------
        $user=auth::User();
        $user_data=User::find($user->id);
        $admin = admin::find(3);
        $data = [
           'nama'=> 'Admin',
           'message'=>'Transaksi Berhasil Dibatalkan!',
           'id'=> $id,
           'category' => 'canceled'
       ];
       $data_encode = json_encode($data);
       $user_data->createNotifUser($data_encode);
       //notif user---------------------------------------

        return redirect()->back();
    }

    public function keranjang_bayar(Request $request)
    {
        $user_id = Auth()->user()->id;
        $courier = courier::where('courier', '=', $request->courier)->first();
        $timeout = Carbon::now();
        $timeout->addDays(1);
        $timeout->format('Y-m-d H:i:s');
        $transaksi = array(
            'user_id' => $user_id,
            'courier_id' => $courier->id,
            'timeout' => $timeout,
            'address' => $request->address,
            'regency' => $request->regency,
            'province' => $request->province,
            'total' => $request->total,
            'shipping_cost' => $request->shipping_cost,
            'sub_total' => $request->subtotal,
            'status' => "menunggu bukti pembayaran",
        );
 
        transaction::create($transaksi);

        $transaction = transaction::where('user_id', '=', $user_id)->where('total', '=', $request->total)->orderBy('id', 'DESC')->first();
      
        $i = 0;
        foreach ($request->keranjang as $keranjangs) {
            $keranjang = cart::find($keranjangs);
            $transaksi_detail = array(
                'transaction_id' => $transaction->id,
                'product_id' => $keranjang->product_id,
                'qty' => $keranjang->qty,
                'discount' => $request->discount[$i],
                'selling_price' => $request->selling_price[$i],
            );
            transaction_detail::create($transaksi_detail);
            $book = product::find($keranjang->product_id);
            $book->stock = $book->stock - $keranjang->qty;
            $book->save();
            $i++;
        }

        $transaction = transaction::where('user_id', '=', $user_id)->where('total', '=', $request->total)->orderBy('id', 'DESC')->first();

        
        return redirect()->route('client.transaksi-detail',$transaction->id);
        
    }
    public function transaksi_buktis()
    {
        $transaction = transaction::orderBy('id', 'DESC')->paginate(10);
        Paginator::useBootstrap();
        $tanggal = Carbon::now();
        $interval = array();
        foreach ($transaction as $transactions) {
            if ($transactions->status == "menunggu bukti pembayaran" && $transactions->timeout < $tanggal) {
                $transactions->status = "transaksi expired";
                $transactions->save();  
            }
                        
            $date = Carbon::createFromFormat('Y-m-d H:s:i', $transactions->timeout)->toDateTimeString();
            $countdown = $tanggal->diffAsCarbonInterval($date);
            array_push($interval, $countdown);
        }

        return view('transaksi', compact('transaction', 'interval'));
    }

}

