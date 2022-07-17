<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index($prod_slug){
        $product = Product::where('slug',$prod_slug)->first();
        
        return view('frontend.review.add', compact('product'));
    }

    public function addrw(Request $request){
        $product_id = $request->input('prod_id');
        $product = Product::where('id', $product_id)->first();
        if($product){
            $user_review = $request->input('user_review');
            $review = new Review();
            $review->user_id = Auth::id();
            $review->prod_id = $product_id;
            $review->user_review = $user_review;
            $review->save();
            if($review->user_review != NULL){
                return redirect('product-detail/'.$product->slug)->with('status','Đánh giá sản phẩm thành công.');
            }
            else return redirect()->back()->with('status','Vui lòng nhập đánh giá về sản phẩm!');
        }
       
    }

    public function edit($prod_slug){
        $product = Product::where('slug', $prod_slug)->first();
        if($product){
            $product_id = $product->id;
            $review = Review::where('user_id',Auth::id())->where('prod_id', $product_id)->first();
            if($review){
                return view('frontend.review.edit',compact('review','product'));
            }
        }
    }

    public function update(Request $request){
        $user_review = $request->input('user_review');
        if($user_review != ''){
            $review_id = $request->input('review_id');
            $review =  Review::where('id',$review_id)->where('user_id', Auth::id())->first();
            $product = Product::where('id', $review->prod_id)->first();
            if($review){
                $review->user_review = $request->input('user_review');
                $review->update();
                return redirect('product-detail/'.$product->slug)->with('status', 'Chỉnh sửa đánh giá thành công.');
            }
        }
    }

}
