<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\product_review;
use App\Models\response;
use App\Models\Admin;
use App\Models\User;
use App\Models\user_notification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductReviewController extends Controller
{
      public function store(request $request, product $product){

        $request->validate([
            'content'=>'required',
            'rate' => 'required|numeric'
        ]);
        //$productId = product::find($product->id);
        product_review::create([
            'product_id' => $request->product_id,
            'user_id' => Auth()->user()->id,
            'content' => $request->content,
            'rate' => $request->rate
        ]);
        $user = Auth()->user();
            $admin = Admin::find(1);
            $data = [
                'nama' => $user->name,
                'message' => 'seseorang mereview product!',
                'id' => $request->product_id,
                'category' => 'review'
            ];
            $data_encode = json_encode($data);
            $admin->createNotif($data_encode);
        return back()->with('success', 'Comment added succesfully');

    }
    public function listreview(){
        $product_review = product_review::all();
        $products = product::all();
        return view('listview', compact('products','product_review'));
    }
    public function response(product_review $product_review)
    {
        $product_review = product_review::find($product_review->id);
        $products = product::all();
        //return $product_review;
        return view('response', compact('product_review','products'));
    }
    public function replyreview(request $request){

        $request->validate([
            'content'=>'required',
        ]);
        //$productId = product::find($product->id);
        response::create([
            'review_id' => $request->review_id,
            'admin_id' => Auth::guard('admin')->user()->id,
            'content' => $request->content,
        ]);
        $review = DB::table('product_reviews')->where('id', $request->review_id)->value('user_id');
        $user = User::find($review);
        $data_user = User::find($user->id);
        $admin = Admin::find(1);
        $data = [
            'nama' => $admin->name,
            'message' => 'membalas review',
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $user->createNotifusers($data_encode);
        //Notif User-------------------------------------------------------------------
        return redirect('/listreview');
    }
}
