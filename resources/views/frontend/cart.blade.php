@extends('layouts.frontend')
<title>
Cutie Ladies | Giỏ hàng
</title>

@section('content')

<div class="py-5">
    <div class="container">
    @if($cartitems->count() >0)
        <h2>Giỏ hàng</h2>
        <div class="card shadow"> 
            <div class="card-header">
                <table >
                    <thead>
                        <tr>
                            <th class="cus-table">Hình ảnh</th>
                            <th class="cus-table1">Tên sản phẩm</th>
                            <th class="cus-table">Giá</th>
                            <th class="cus-table">Số lượng</th>
                            <th class="cus-table2"></th>
                        </tr>
                    </thead>  
                </table>      
            </div>
            
            <div class="card-body">
                @php $total =0; @endphp
                @foreach ($cartitems as $item)
                <div class="row product-data">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/products/'.$item->products['image1'])}}" alt="Cart item" class="cartitem-img">
                    </div>
                
                    <div class="col-md-5">
                        <h6> {{$item->products['name']}} </h6>
                    </div>
                
                
            
                    <div class="col-md-2" style="text-align:center;">
                        <h6> {{number_format($item->products['selling_price'],0, ',','.')}} đ </h6>
                    </div>      
            
                    <div class="col-md-2" >
                        <div class="input-group mb-3" >
                            <input type="hidden" class="prod_id" value="{{$item->prod_id}}" style="margin:auto; display:block;">
                            <!-- <label for="Quantity" style="padding-right:20px">Số lượng</label> -->
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-number cus-btn-qty dec-btn changeQty" >
                                    <div class="fa fa-minus"></div>
                                </button>
                            </div>
                            <input type="text" name="quantity" class="form-control qty-input cus-form" value="{{$item->prod_qty}}" readonly>
                            <div class="input-group-append ">
                                <button type="button" class="btn btn-number cus-btn-qty inc-btn changeQty">
                                    <div class="fa fa-plus"></div>
                                </button>
                            </div>
                      
                        </div> 
                    </div>
            

            
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger delete " style="margin:auto; display:block;"><i class="fa fa-trash"></i></button>
                    </div>
                                
                </div>
                @php $total += $item->products['selling_price'] * $item->prod_qty; @endphp
                @endforeach
            </div>  

            <div class="card-footer">
                <h5 class="float-end"> <b>Tổng tiền: </b>{{number_format($total,0, ',','.')}} đ</h5> 
                <br> <br>
                <a href="{{url('checkout')}}" class="btn btn-outline-success float-end cus-btn-buy">Thanh toán</a>
            </div> 
        </div>
        @else
        <img class="center" src="{{asset('frontend/img/empty-cart.png')}}" width="400px"  alt="Empty">
        <h6 style="font-size:20px;text-align: center;"><b> Chưa có sản phẩm trong giỏ hàng </b></h6>
        <div style="text-align:center;">
            <a href="{{url('product-list')}}" class="btn btn-primary cus-btn-buy center">Thêm sản phẩm</a>
        </div>
        @endif 
    </div>
</div>

   
<script type="text/javascript">

$(document).ready(function() {
    $('.delete').click(function (e){
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var prod_id = $(this).closest('.product-data').find('.prod_id').val();
        $.ajax({
            method: "post",
            url: "del-cart-item",
            data: {
                'prod_id': prod_id,                
            },
            success: function (response){
                swal({
                title: "Bạn muốn xóa sản phẩm này?",
                icon: "warning",
                buttons: ["Hủy", "Xóa"],
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.reload();
                    }
                });
            } 
        });     
    });

    $('.inc-btn').click(function (e){
        e.preventDefault();
        var incvalue= $(this).closest('.product-data').find('.qty-input').val();
        var value = parseInt(incvalue, 10);
        value = isNaN(value) ? 0 : value;
        if(value <10){
            value++;
            $(this).closest('.product-data').find('.qty-input').val(value);
        }
    });

    $('.dec-btn').click(function (e){
        e.preventDefault();
        var decvalue= $(this).closest('.product-data').find('.qty-input').val();
        var value = parseInt(decvalue, 10); 
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $(this).closest('.product-data').find('.qty-input').val(value);
        }
    });

    $('.changeQty').click(function (e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var product_id= $(this).closest('.product-data').find('.prod_id').val();
        var product_qty= $(this).closest('.product-data').find('.qty-input').val();
        $.ajax({
            method: "post",
            url: "update-cart",
            data: {
                'product_id': product_id,  
                'product_qty':product_qty,              
            },
            success: function (response){
               swal(response.status).then(function(){ 
                   location.reload();
               })
            } 
        });  
    });

})
</script>

@endsection