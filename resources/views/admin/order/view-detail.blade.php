@extends('layouts.admin')
<title>
    Admin | Chi tiết đơn hàng
</title>

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h2>Chi tiết đơn hàng #{{$orders->id}}</h2>  
            </div>
            <div class="col-md-6" style="text-align:right">
                @if($orders->status == 'Giao hàng thành công')
                <a href="{{ url('orders-history') }}" class="btn btn-success ">Trở về đơn hàng</a>
                @endif
                @if($orders->status == 'Đã hủy')
                <a href="{{ url('canceled-orders') }}" class="btn btn-success ">Trở về đơn hàng</a>
                @endif
                @if($orders->status == 'Đang xử lý' || $orders->status == 'Đã xác nhận' || $orders->status == 'Đang giao hàng')
                <a href="{{ url('orders') }}" class="btn btn-success ">Trở về đơn hàng</a>
                @endif
            </div>

            <div class="col-md-6">
                <h5> <b>  Địa Chỉ Nhận Hàng</b></h5>
                <h6>{{$orders->name}}</h6>
                <h6>{{$orders->phone}}</h6>
                <h6>{{$orders->address}}</h6>
            </div>

            <div class="col-md-3">
            @if($orders->status == 'Giao hàng thành công')
                <h5> <b> Ngày Giao Hàng</b></h5>
                <h6  style="padding-right: 20px">{{date_format($orders->updated_at,"d/m/Y H:i")}}</h6>
            @endif
            @if($orders->status == 'Đang xử lý' || $orders->status == 'Đã xác nhận' || $orders->status == 'Đang giao hàng' || $orders->status == 'Đã hủy')
                <h5> <b> Ngày Đặt Hàng</b></h5>
                <h6 style=" padding-right: 20px">{{date_format($orders->created_at,"d/m/Y H:i")}}</h6>
            @endif
            </div>
            
        
            <div class="col-md-3">
                <h5> <b>Trạng Thái </b></h5>
            @if($orders->status == 'Đã hủy')
                <h6>Đã hủy</h6>
            </div>

            <hr>
            <div class="card-body">
                
                @foreach ($orders->orderdetail as $item)
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/products/'.$item->products['image1'])}}" alt="Cart item" width="70px">
                    </div>
                
                    <div class="col-md-5">
                        <h6> {{$item->products['name']}}  </h6>
                    </div>

                    <div class="col-md-3"  style="text-align:center;">
                        <h6>x{{$item->qty}}</h6>
                    </div>     
                    
                    <div class="col-md-2"  style="text-align:right;padding-right: 30px;">
                        <h6> {{number_format($item->products['selling_price'],0, ',','.')}} đ </h6>
                    </div>         

                </div> <hr>
                @endforeach
                <div class="card-footer">
                    <h5 style="text-align:right;"> <b>Tổng tiền: </b>{{number_format($orders->total_price,0, ',','.')}} đ</h5>
                </div>  
            </div>
            @endif
            
            @if($orders->status == 'Giao hàng thành công')
                <h6>GIAO HÀNG THÀNH CÔNG</h6>
            </div>

            <hr>
            <div class="card-body">
                
                @foreach ($orders->orderdetail as $item)
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/products/'.$item->products['image1'])}}" alt="Cart item" width="70px">
                    </div>
                
                    <div class="col-md-5">
                        <h6> {{$item->products['name']}}  </h6>
                    </div>

                    <div class="col-md-3"  style="text-align:center;">
                        <h6>x{{$item->qty}}</h6>
                    </div>     
                    
                    <div class="col-md-2"  style="text-align:right;padding-right: 30px;">
                        <h6> {{number_format($item->products['selling_price'],0, ',','.')}} đ </h6>
                    </div>         

                </div> <hr>
                @endforeach
                <div class="card-footer">
                    <h5 style="text-align:right;"> <b>Tổng tiền: </b>{{number_format($orders->total_price,0, ',','.')}} đ</h5>
                </div>  
            </div>
            @endif
            
            @if($orders->status == 'Đang xử lý' || $orders->status == 'Đã xác nhận' || $orders->status == 'Đang giao hàng' )
            <div class="col-md-3">
                <form action="{{url('update-order/'.$orders->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                <select style="font-size:14px; width:222px; height:35px;" class="form-select" name="order_status">
                    <option value="Đang xử lý" selected >Đang xử lý</option>
                    <option value="Đã xác nhận" >Đã xác nhận</option>
                    <option value="Đang giao hàng" >Đang giao hàng</option>
                    <option value="Giao hàng thành công" >Giao hàng thành công</option>
                </select>
            </div>
        </div>
               
        
        <hr>
            <div class="card-body">
                
                @foreach ($orders->orderdetail as $item)
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/products/'.$item->products['image1'])}}" alt="Cart item" width="70px">
                    </div>
                
                    <div class="col-md-5">
                        <h6> {{$item->products['name']}}  </h6>
                    </div>

                    <div class="col-md-3"  style="text-align:center;">
                        <h6>x{{$item->qty}}</h6>
                    </div>     
                    
                    <div class="col-md-2"  style="text-align:right;padding-right: 30px;">
                        <h6> {{number_format($item->products['selling_price'],0, ',','.')}} đ </h6>
                    </div>         

                </div> <hr>
                @endforeach
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-9">
                            <h5> <b>Tổng tiền: </b>{{number_format($orders->total_price,0, ',','.')}} đ</h5>
                        </div>
                        <div class="col-md-3" style="text-align:right">
                            <button style="text-align:right;" type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                </div>  
            </div>
        </form> 
        @endif
    </div>
</div>
@endsection