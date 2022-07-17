@extends('layouts.frontend')
<title>
Cuties Ladies | Đơn hàng
</title>

@section('content')
<div class="py-5">
    <div class="container">
    @if($orders->count() >0)
        <h2> Đơn mua</h2>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead style="text-align: center; background-color: #f9b7a7; ">
                        <tr>
                            <th>Mã vận đơn</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;"> 
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{$item->tracking_no}}</td>
                                <td>{{date_format($item->created_at,"d/m/Y H:i")}}</td>
                                <td>{{ number_format($item->total_price,0, ',','.')}} đ</td>
                                <td>{{$item->status}}</td>
                                <td>
                                <a href="{{url('view-order-detail/'. $item->id)}}" class="btn btn-primary cus-btn-buy">Xem chi tiết</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
        @else 
        <img class="center" src="{{asset('frontend/img/emptyorder.png')}}" width="300px"  alt="Empty">
        <h6 style="font-size:20px;text-align: center;"><b> Chưa có đơn hàng </b></h6>
        <div style="text-align:center;">
            <a href="{{url('cart')}}" class="btn btn-primary cus-btn-buy center">Đến giỏ hàng</a> 
            <a href="{{url('product-list')}}" class="btn btn-primary cus-btn-buy center">Mua hàng ngay</a>
        </div>
        @endif
    </div>   
</div>


@endsection