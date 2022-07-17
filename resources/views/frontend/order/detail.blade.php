@extends('layouts.frontend')
<title>
   Cuties Ladies | Chi tiết đơn hàng
</title>

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6"><h2>Chi tiết đơn hàng</h2></div>
            <div class="col-md-6"><a href="{{url('my-orders')}}" class="btn btn-primary cus-btn-buy float-end">Trở về đơn hàng</a></div>
        </div>
        <div class="card shadow order_check"> 
        @if($orders->status == 'Đang xử lý')
            <div class="card-header">
                <div class="float-start" >
                    <h5> <b>  Địa Chỉ Nhận Hàng</b></h5>
                    <h6>{{$orders->name}}</h6>
                    <h6>{{$orders->phone}}</h6>
                    <h6>{{$orders->address}}</h6>
                </div>

                <div class="float-end" >
                    <h6 style="color:#FF6F61; padding-right: 20px" > <b> ĐANG XỬ LÝ</b></h6>
                </div>
                <br> <br>
                <h6 class="float-end" style=" padding-right: 20px"> <b>Ngày đặt hàng: </b>{{date_format($orders->created_at,"d/m/Y H:i")}}</h6>
            </div>

            <div class="card-body">
                @foreach ($orders->orderdetail as $item)
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/products/'.$item->products['image1'])}}" alt="Cart item" class="cartitem-img">
                    </div>
                
                    <div class="col-md-5">
                        <h6> {{$item->products['name']}} <br> x{{$item->qty}} </h6>
                    </div>

                    <div class="col-md-3"  style="text-align:center;">
                        
                    </div>     
                    
                    <div class="col-md-2"  style="text-align:right;padding-right: 30px;">
                        <h6> {{number_format($item->products['selling_price'],0, ',','.')}} đ </h6>
                    </div>         

                </div> <hr>
                @endforeach
                <div class="card-footer">
                    <h5 class="float-end"> <b>Tổng tiền: </b>{{number_format($orders->total_price,0, ',','.')}} đ</h5> <br><br>
                    <form action="{{url('cancel-order/'.$orders->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="status" class="order_status" value="Đã hủy">
                    <button type="submit"  class="btn btn-primary cus-btn-buy float-end cancel">Hủy đơn hàng</button> 
                    
                    <!-- <a href="#" data-id="{{$orders->id}}" class="btn btn-primary cus-btn-buy float-end cancel">Hủy đơn hàng</a>  -->
                </div>   
            </div>
        @endif

        @if($orders->status == 'Đã xác nhận')
            <div class="card-header">
                <div class="float-start" >
                    <h5> <b>  Địa Chỉ Nhận Hàng</b></h5>
                    <h6>{{$orders->name}}</h6>
                    <h6>{{$orders->phone}}</h6>
                    <h6>{{$orders->address}}</h6>
                </div>

                <div class="float-end" >
                    <h6 style="color:#FF6F61; padding-right: 20px" > <b> ĐÃ XÁC NHẬN</b></h6>
                </div>
                <br> <br>
                <h6 class="float-end" style=" padding-right: 20px"> <b>Ngày đặt hàng: </b>{{date_format($orders->created_at,"d/m/Y H:i")}}</h6>
            </div>
            <div class="card-body">
                @foreach ($orders->orderdetail as $item)
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/products/'.$item->products['image1'])}}" alt="Cart item" class="cartitem-img">
                    </div>
                
                    <div class="col-md-5">
                        <h6> {{$item->products['name']}} <br> x{{$item->qty}} </h6>
                    </div>

                    <div class="col-md-3"  style="text-align:center;">
                        
                    </div>     
                    
                    <div class="col-md-2"  style="text-align:right;padding-right: 30px;">
                        <h6> {{number_format($item->products['selling_price'],0, ',','.')}} đ </h6>
                    </div>         

                </div> <hr>
                @endforeach
                <div class="card-footer">
                    <h5 class="float-end"> <b>Tổng tiền: </b>{{number_format($orders->total_price,0, ',','.')}} đ</h5> <br><br>
                </div>   
            </div>
            @endif

            @if($orders->status == 'Đã hủy')
            <div class="card-header">
                <div class="float-start" >
                    <h5> <b>  Địa Chỉ Nhận Hàng</b></h5>
                    <h6>{{$orders->name}}</h6>
                    <h6>{{$orders->phone}}</h6>
                    <h6>{{$orders->address}}</h6>
                </div>

                <div class="float-end" >
                    <h6 style="color:#FF6F61; padding-right: 20px" > <b> ĐÃ HỦY</b></h6>
                </div>
            </div>
            <div class="card-body">    
                @foreach ($orders->orderdetail as $item)
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/products/'.$item->products['image1'])}}" alt="Cart item" class="cartitem-img">
                    </div>
                
                    <div class="col-md-5">
                        <h6> {{$item->products['name']}} <br> x{{$item->qty}} </h6>
                    </div>

                    <div class="col-md-3"  style="text-align:center;">
                        
                    </div>     
                    
                    <div class="col-md-2"  style="text-align:right;padding-right: 30px;">
                        <h6> {{number_format($item->products['selling_price'],0, ',','.')}} đ </h6>
                    </div>         

                </div> <hr>
                @endforeach
                <div class="card-footer">
                    <h5 class="float-end"> <b>Tổng tiền: </b>{{number_format($orders->total_price,0, ',','.')}} đ</h5> 
                </div>   
            </div>
            @endif

            @if($orders->status == 'Đang giao hàng')
            <div class="card-header">
                <div class="float-start" >
                    <h5> <b>  Địa Chỉ Nhận Hàng</b></h5>
                    <h6>{{$orders->name}}</h6>
                    <h6>{{$orders->phone}}</h6>
                    <h6>{{$orders->address}}</h6>
                </div>

                <div class="float-end" >
                    <h6 style="color:#FF6F61; padding-right: 20px" > <b> ĐANG GIAO HÀNG</b></h6>
                </div>
                <br> <br>
                <h6 class="float-end" style=" padding-right: 20px"> <b>Ngày đặt hàng: </b>{{date_format($orders->created_at,"d/m/Y H:i")}}</h6>
            </div>
            <div class="card-body">
                @foreach ($orders->orderdetail as $item)
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/products/'.$item->products['image1'])}}" alt="Cart item" class="cartitem-img">
                    </div>
                
                    <div class="col-md-5">
                        <h6> {{$item->products['name']}} <br> x{{$item->qty}} </h6>
                    </div>

                    <div class="col-md-3"  style="text-align:center;">
                        
                    </div>     
                    
                    <div class="col-md-2"  style="text-align:right;padding-right: 30px;">
                        <h6> {{number_format($item->products['selling_price'],0, ',','.')}} đ </h6>
                    </div>         

                </div> <hr>
                @endforeach
                <div class="card-footer">
                    <h5 class="float-end"> <b>Tổng tiền: </b>{{number_format($orders->total_price,0, ',','.')}} đ</h5> <br><br>
                </div>   
            </div>
            @endif

            @if($orders->status == 'Giao hàng thành công')
            <div class="card-header">
                <div class="float-start" >
                    <h5> <b>  Địa Chỉ Nhận Hàng</b></h5>
                    <h6>{{$orders->name}}</h6>
                    <h6>{{$orders->phone}}</h6>
                    <h6>{{$orders->address}}</h6>
                </div>
                <div class="float-end" >
                    <h6 style="color:#FF6F61; padding-right: 20px" > <b>GIAO HÀNG THÀNH CÔNG </b></h6>
                </div>
                <br> <br>
                <h6 class="float-end" style=" padding-right: 20px"> <b>Ngày giao hàng: </b>{{date_format($orders->updated_at,"d/m/Y H:i")}}</h6>
            </div>
            <div class="card-body">
                
                @foreach ($orders->orderdetail as $item)
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/products/'.$item->products['image1'])}}" alt="Cart item" class="cartitem-img">
                    </div>
                
                    <div class="col-md-5">
                        <h6> {{$item->products['name']}} <br> x{{$item->qty}} </h6>
                    </div>

                    <div class="col-md-3"  style="text-align:center;">
                        <h6> {{number_format($item->products['selling_price'],0, ',','.')}} đ </h6>
                    </div>     
                    
                    <div class="col-md-2" style="text-align:center;" >
                        <a href="{{url('write-review/'.$item->products['slug'])}}" class="btn btn-primary cus-btn-buy">Đánh giá</a>
                    </div>         

                </div> <hr>
                @endforeach
                <div class="card-footer">
                
                    <h5 class="float-end"> <b>Tổng tiền: </b>{{number_format($orders->total_price,0, ',','.')}} đ</h5> 
                </div>   
            </div>
            @endif
        </div>
    </div>
</div>

<script type="text/javascript">
// $(document).ready(function() {
//     $('.cancel').click(function(){
//         var cel = $(this).attr('data-id');
//         swal({
//             title: "Bạn chắc chắn muốn hủy đơn hàng?",
//             text: "Bạn sẽ không thể khôi phục đơn hàng đã hủy!",
//             icon: "warning",
//             buttons: ["Trở về", "Hủy đơn hàng"],
//             dangerMode: true,
//             })
//             .then((willDelete) => {
//                 if (willDelete) {
//                     window.location = "cancel-order/"+cel+""
//                     swal("Hủy đơn hàng thành công.", {
//                     icon: "success",
//                     });
//                 } 
//             });
//     })
// })
    
</script> 
@endsection