@extends('layouts.frontend')
<title>
Cutie Ladies | Thanh toán
</title>

@section('content')
<div class="py-5">
    <div class="container"><h2>  Thanh toán </h2>
            <div class="row">
                <!-- <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel" style="font-weight: 600" >Chi tiết thẻ tín dụng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body credit-form">
                            <form action="">
                                <label for="">Họ và tên trên thẻ</label>
                                <input type="text" class="form-control name">
                                <span class="text-danger" id="name_error"></span>
                                <br>
                                <label for="">Số thẻ</label>
                                <input type="text" class="form-control card">
                                <span class="text-danger" id="card_error"></span>
                                <br>
                                <label for="">Ngày hết hạn</label>
                                <input type="text" class="form-control date" placeholder="MM/YY">
                                <span class="text-danger" id="date_error"></span>
                                <br>
                                <label for="">Mã CVV</label>
                                <input type="text" class="form-control cvv">
                                <span class="text-danger" id="cvv_error"></span>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary cus-btn-cart" data-bs-dismiss="modal">Trở về</button>
                            <button type="submit" class="btn btn-primary cus-btn-buy paycard">Thanh toán</button>
                        </div>
                        </div>
                    </div>
                </div> -->

                <div class="col-md-5">
                    <div class="card">
                    <form id="formcheck" action="{{url('order')}}" method="POST">
                        {{csrf_field()}}
                        <div class="card-body">
                            <h5> <b>Địa chỉ nhận hàng </b></h5> <hr>
                            <div class="row checkout-form">
                                <div class="col-md-12">
                                    <label for="">Họ và tên</label>
                                    <input type="text" class="form-control name" value="{{Auth::user()->name}}" name="name" placeholder="Nhập họ và tên">
                                    <span id="name_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control email" value="{{Auth::user()->email}}"name="email" placeholder="Nhập email (VD: example@example.com)">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control phone" value="{{Auth::user()->phone}}" name="phone" placeholder="Nhập số điện thoại">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="">Địa chỉ nhận hàng</label>
                                    <input type="text" class="form-control address" value="{{Auth::user()->address}}" name="address" placeholder="Nhập địa chỉ nhận hàng">
                                    <span id="address_error" class="text-danger"></span>
                                </div>
                                <!-- <div class="col-md-12 mt-3">
                                    <label for="">Phương thức thanh toán</label> <br>
                                    <input class="form-check-input" type="radio" value="1"  name="radio" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1" style="font-weight: normal">
                                        Thanh toán khi nhận hàng 
                                    </label>
                                    <br>
                                    <input class="form-check-input" type="radio" value="0"  name="radio" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2" style="font-weight: normal">
                                        Thanh toán bằng thẻ tín dụng
                                    </label>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h5> <b> Sản phẩm</b></h5> <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total =0; @endphp
                                    @foreach ($cartitems as $item)
                                    <tr>
                                    <td width="500px"> {{ $item->products['name']}} <br> x{{ $item->prod_qty}}</td>
                                    <td>{{ number_format($item->products['selling_price'],0, ',','.')}} đ</td>
                                    </tr>
                                    @php $total += $item->products['selling_price'] * $item->prod_qty; @endphp
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <p class="float-end" style="font-size:20px"> <b> Tổng tiền: </b>{{ number_format($total,0, ',','.')}} đ</p> <br> <br>
                            <button type="submit" class="btn btn-primary float-end cus-btn-buy check-out">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- <script>
$(document).ready(function() {
    $('.paycard').click(function (e){
        e.preventDefault();

        var name = $(.name).val();
        var card = $(.card).val();
        var date = $(.date).val();
        var cvv = $(.cvv).val();

        if(!name){
            name_error = "Vui lòng nhập họ và tên trên thẻ!";
            $('#name_error').html('');
            $('#name_error').html(name_error);
        }else{
            name_error = "";
            $('#name_error').html('');
        }

        if(!card){
            card_error = "Vui lòng nhập họ và tên trên thẻ!";
            $('#card_error').html('');
            $('#card_error').html(name_error);
        }else{
            card_error = "";
            $('#card_error').html('');
        }

        if(!date){
            date_error = "Vui lòng nhập họ và tên trên thẻ!";
            $('#date_error').html('');
            $('#date_error').html(name_error);
        }else{
            date_error = "";
            $('#date_error').html('');
        }

        if(!cvv){
            cvv_error = "Vui lòng nhập họ và tên trên thẻ!";
            $('#cvv_error').html('');
            $('#cvv_error').html(name_error);
        }else{
            cvv_error = "";
            $('#cvv_error').html('');
        }

        if(name_error != '' || card_error != ''|| date_error != ''|| cvv_error != ''){
            return false;
        }else{
            var data={
                name = $(.name).val();
                card = $(.card).val();
                date = $(.date).val();
                cvv
            }

            $.ajax({
                method: "POST",
                url: "/add-review" ,
                data: {
                'name' :name,
                'card':card,
                'date':date,
                'cvv':cvv,
                } ,
                success: function(response){
                    swal(response.status);
                }
            })
        }
    });
});
</script>
<script>
$(document).ready(function() {
    $('input[name="radio"]').change(function() {
        if($(this).is(':checked') && $(this).val() == '0') {
                $('#myModal').modal('show');
        }
    });
});
</script> -->
<!-- <script type="text/javascript">
$(document).ready(function() {
    $('.check-out').click(function (e){
        e.preventDefault();

        var name= $('.name').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address =$('.address').val();

        if(!name){
            name_error = "Vui lòng nhập tên của bạn!";
            $('#name_error').html('');
            $('#name_error').html(name_error);
        }
        if(!email){
            email_error = "Vui lòng nhập email của bạn!";
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }
        if(!phone){
            phone_error = "Vui lòng nhập số điện thoại!";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }
        if(!address){
            address_error = "Vui lòng nhập địa chỉ nhận hàng!";
            $('#address_error').html('');
            $('#address_error').html(address_error);
        }

        if(name_error !=''|| email_error !='' || phone_error !='' || address_error != ''){
            return false;
        }else{
            var data ={
                'name': name,
                'email':email,
                'phone':phone,
                'address':address
            }
            $.ajax({
                method: "POST",
                url: "/add-review" ,
                data: data,            
                success: function(response){
                    swal(response.status);
                }
            })
        }
        
    })
});
</script> -->
@endsection


