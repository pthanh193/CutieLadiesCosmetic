<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;

class UserController extends Controller
{
    
    public function index(){
        $orders = Order::where('user_id',Auth::id())->get();
        return view('frontend.order.index',compact('orders'));
    }

    public function view($id){
        $orders = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('frontend.order.detail',compact('orders'));
    }

    public function cancel(Request $request, $id){
        $orders = Order::find($id);
        $orders->status = $request->input('status');
        // $orders->status = 'Đã hủy';
        $orders->update(); 
        return redirect('view-order-detail/'.$orders->id)->with('status', 'Hủy đơn hàng thành công.');
    }
}
