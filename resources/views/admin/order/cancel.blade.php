@extends('layouts.admin')
<title>
    Admin | Đơn hàng
</title>

@section('content')
<div class="card">
        <div class="card-header">
    @if($orders->count() >0)
        <h1> Đơn hàng đã hủy</h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead >
                        <tr>
                            <th>Mã vận đơn</th>
                            <th>Tên KH</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{$item->tracking_no}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{date_format($item->created_at,"d/m/Y H:i")}}</td>
                                <td>{{$item->status}}</td>
                                <td><a href="{{url('order-detail/'. $item->id)}}" class="btn btn-primary cus-btn-buy">chi tiết</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
        @endif
    </div>   
</div>
@endsection