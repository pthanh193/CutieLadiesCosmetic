<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;



class CheckoutController extends Controller
{
    
    public function index(){
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitems as $items)
        {
            if(!Product::where('id',$items->prod_id)->where('qty','>=',$items->prod_qty)->exists())
            {
                $rmItem = Cart::where('user_id', Auth::id())->where('prod_id',$items->prod_id)->first();
                $rmItem->delete();
            }
        }
        $cartitems = Cart::where('user_id',Auth::id())->get();
        
        return view('frontend.checkout', compact('cartitems'));
    }

    public function order(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->tracking_no = rand(1111,9999);
        $total = 0;
        $cart_total= Cart::where('user_id', Auth::id())->get();
        foreach($cart_total as $prod){
            $total += $prod->products['selling_price'] * $prod->prod_qty; 
        }
        $order->total_price = $total; 
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item){
            OrderDetail::create([
                'order_id'=>$order->id,
                'prod_id'=> $item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->products['selling_price'],

            ]);

            $prod = Product::where('id',$item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address == NULL){
            $user = User::where('id',Auth::id())->first();
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->update();
        }

        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect('my-orders')->with('status',"Đặt hàng thành công");
    }

    public function card(Request $request){
        $detail = new OrderDetail();
    }
}
