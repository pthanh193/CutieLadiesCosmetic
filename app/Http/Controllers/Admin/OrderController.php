<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::where('status', 'Đang xử lý')
        ->orWhere('status', 'Đã xác nhận')->orWhere('status', 'Đang giao hàng')->get();        
        return view('admin.order.index',compact('orders'));
    }

    public function detail($id){
        $orders=Order::where('id',$id)->first();
        return view('admin.order.view-detail',compact('orders'));
    }

    public function update(Request $request, $id){
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status',"Cập nhật đơn hàng thành công.");
    }
    public function history(){
        $orders=Order::where('status','Giao hàng thành công')->get();        
        return view('admin.order.history',compact('orders'));
    }
    public function cancel(){
        $orders=Order::where('status','Đã hủy')->get();        
        return view('admin.order.cancel',compact('orders'));
    }

}
