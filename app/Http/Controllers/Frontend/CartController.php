<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProd(Request $request){
        $product_id = $request ->input('product_id');
        $product_qty = $request ->input('product_qty');

        if(Auth::check()){
            $prod_check = Product::where('id',$product_id)->first();
            if($product_qty > $prod_check->qty){
                return response()->json(['status'=>'Không thể thêm sản phẩm vào giỏ hàng do vượt quá số lượng có sẵn!']);
            }else{
                if($prod_check){
                    $cartItem = new Cart();
                    $cartItem -> prod_id = $product_id;
                    $cartItem -> user_id= Auth::id();
                    $cartItem -> prod_qty = $product_qty;
                    $cartItem ->save();
                    return response()->json(['status'=>'Sản phẩm đã được thêm vào Giỏ hàng.']);  
                }
            }
        }else
        return response()->json(['status'=>'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!']);  
} 

    public function viewcart(){
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart', compact('cartitems'));
    }

    public function updateCart(Request $request)
    {
        $product_id = $request ->input('product_id');
        $product_qty = $request ->input('product_qty');
        if(Auth::check())
        {
            if(Cart::where('prod_id', $product_id)->where('user_id',Auth::id())->exists())
            {
                $product = Product::where('id',$product_id)->first();
                $cart = Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->first();
                if($product_qty > $product->qty){
                    return response()->json(['status'=> "Không thể thêm sản phẩm do vượt quá số lượng có sẵn!"]);
                }else {
                    $cart->prod_qty = $product_qty;
                    $cart->update();
                    return back();
                }
            }
        }
    }

    public function delCartItem(Request $request)
    {
        if(Auth::check()){
            $prod_id = $request->input('prod_id');
            if(Cart::where('prod_id', $prod_id)->where('user_id',Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return back();
            }
        }
    }

    public function countItems(){
        $cartcount = Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$cartcount]); 
    }

}
