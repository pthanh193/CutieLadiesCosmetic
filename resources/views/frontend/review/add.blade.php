@extends('layouts.frontend')
<title>
    Cuties Ladies | Đánh giá
</title>

@section('content')
<div class="py-5">
    <div class="container">
        <h2>Đánh giá sản phẩm</h2>
        <div class="card-shadow ">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2" style="text-align:center">
                            <img src="{{asset('assets/uploads/products/'.$product->image1)}}" style="width:120px;height:120px;" alt="prodview-img" class="detail-img">
                        </div>
                        <div class="col-md-6">
                                <h5>{{$product->name}} <br> <h6> Thương hiệu: {{$product->brand['name']}}</h6></h5>
                                <h6>Giá bán: {{number_format($product->selling_price,0, ',','.')}} đ</h6>
                        </div>
                    </div>

                    <form action="{{url('add-review')}}" method="POST" >
                        @csrf
                            <input type="hidden" name="prod_id" value="{{$product->id}}" >
                            <textarea class="form-control review" style="height:70px;width:600px;"  name="user_review" rows="5" placeholder="Viết đánh giá của bạn về sản phẩm này."></textarea>
                            <span id="review_error" class="text-danger"></span><br>
                            <button type="submit" class="btn cus-btn-buy addreview">Gửi đánh giá</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
$(document).ready(function() {
    $('.addreview').click(function (e){
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var review= $('.review').val();
        if(!review){
            review_error = "Vui lòng nhập đánh giá của bạn!";
            $('#review_error').html('');
            $('#review_error').html(review_error);
        }else{
            review_error = "";
            $('#review_error').html('');
        }

        if(review_error != ''){
            return false;
        }else{
            
            $.ajax({
                method: "POST",
                url: "/add-review" ,
                data: {
                'review' :review,
                } ,
                success: function(response){
                    swal(response.status);
                }
            })
        }
        
    })
});
</script> -->
@endsection

