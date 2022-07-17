@extends('layouts.frontend')
<title>
    Cuties Ladies | {{$products->name}}
</title>

@section('content')
<div class="py-5">
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('assets/uploads/products/'.$products->image1)}}" alt="prodview-img" class="detail-img">
                    </div>
                    <div class="col-md-8">
                        <h3 class="mb-0">
                            {{$products->name}}                       
                        </h3>
                        
                        <hr>
                        <label class="me-3"> <s> {{number_format($products->original_price,0, ',','.')}} đ</s></label>
                        <label class="fw-bold prices" style="font-size:25px;"> <b> {{number_format($products->selling_price,0, ',','.')}} đ</b> </label>
                        <p class="mt-3">
                            {!! $products->small_description !!}
                        </p>
                        
                        @if($products->qty >0)
                        <div class="row mt-2">
                            <div class="col-md-7">
                                <div class="input-group mb-3">
                                    <input type="hidden" value="{{$products->id}}" class="prod_id">
                                    <label for="Quantity" style="padding-right:20px">Số lượng</label>
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-number cus-btn-qty dec-btn" >
                                                <div class="fa fa-minus"></div>
                                            </button>
                                        </div>
                                        <input type="text" name="quantity" class="form-control qty-input cus-form" value="1" readonly>
                                        <div class="input-group-append ">
                                            <button type="button" class="btn btn-number cus-btn-qty inc-btn">
                                                <div class="fa fa-plus"></div>
                                            </button>
                                        </div>
                                        <div class="cus-p">{{$products->qty}} sản phẩm có sẵn</div>
                                </div>
                            </div>
                            <br/>
                            <div class="col-md-10">
                                <button type="button" class="btn cus-btn-cart  addToCartBtn"><div class="fa fa-cart-plus"></div> Thêm vào giỏ hàng </button>
                            </div>
                        </div>
                        @else
                            <label style="font-weight:bold;color:#FF6F61;font-size:20px ">Hết hàng</label>
                        @endif
                    </div>
                </div>
            </div>
            
            <ul class="nav nav-tabs" id="myTab" style="background:white" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active cus-navlink" style="font-weight:bold" id="tab-javascript" data-toggle="tab" href="#content-javascript" role="tab" aria-controls="content-javascript" aria-selected="false">
                        Thông tin sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cus-navlink" style="font-weight:bold" id="tab-css" data-toggle="tab" href="#content-css" role="tab" aria-controls="content-css" aria-selected="false">
                        Đánh giá
                    </a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active fade card-body" id="content-javascript" role="tabpanel" aria-labelledby="tab-javascript">
                    
                    <div class="title-desc-product"><b>Mô tả sản phẩm:</b></div>
                    <div class="desc-product">{{$products->description}}</div>


                    <div style="width: 100%;">
                        <img src="{{asset('assets/uploads/products/'.$products->image2)}}" alt="" class="img-detail-product">
                    </div>

                    <div>
                        <div class="title-desc-product"><b>Thành phần:</b></div>
                        <div class="desc-product">{{$products->ingredients}}</div>
                    </div>

                    <div>
                        <div class="title-desc-product"><b>Công dụng:</b></div>
                        <div class="desc-product">{{$products->uses}}</div>
                    </div>

                    <div style="width: 100%;">
                        <img src="{{asset('assets/uploads/products/'.$products->image3)}}" alt="" class="img-detail-product">
                    </div>

                    <div>
                        <div class="title-desc-product"><b>Hướng dẫn sử dụng:</b></div>
                        <div class="desc-product">{{$products->directions}}</div>
                    </div>
                </div>

                <div class="tab-pane fade card-body" id="content-css" role="tabpanel" aria-labelledby="tab-css">
                    
                    @foreach($reviews as $item)
                <div class="user-review">
                    <label for=""> <b> {{$item->user['name']}} </b> </label>
                    <p>{{$item->user_review}}</p>
                    <p style="font-size:14px">
                            {{date_format($item->updated_at,"d/m/Y H:i")}}
                            @if($item->user_id == Auth::id() )
                                <a href="{{url('edit-review/'.$products->slug)}}"style="color:#FF6F61">Chỉnh sửa</a>
                            @endif
                        </p>
                </div>
                @endforeach
                </div> 
            </div>
        </div>
    </div>
</div>
<br> <br>
<div class="container">
            <h4 style="font-weight:bold">Các sản phẩm khác</h4>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach($other as $prod)
                    <div class="item">
                        <div class="card">
                            <a class="prod-link" href="{{url('product-detail/'.$prod->slug)}}">
                                <img src="{{asset('assets/uploads/products/'.$prod->image1)}}" alt="product-img" >
                                <div class="card-body">
                                    <h5>{{$prod->name}}</h5>
                                    <span class="float-start prices"> <b> {{number_format($prod->selling_price,0, ',','.')}} đ </b></span>
                                    <span class="float-end" > <s>{{number_format($prod->original_price,0, ',','.')}} đ </s> </span>  
                                </div> 
                            </a>
                        </div>
                    </div>
                @endforeach
                </div>

</div>

<script src="{{ asset('frontend/js/owl.carousel.min.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function() {

    $('.addToCartBtn').click(function(e){
        e.preventDefault();

        var product_id= $(this).closest('.product_data').find('.prod_id').val();
        var product_qty= $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "post",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
                
            },
            dataType: "json",
            success: function (response){
                swal(response.status);
            }           
        })

    });

    $('.inc-btn').click(function (e){
        e.preventDefault();
        var incvalue= $('.qty-input').val();
        var value = parseInt(incvalue, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10){
            value++;
            $('.qty-input').val(value);
        }
    });

    $('.dec-btn').click(function (e){
        e.preventDefault();
        var incvalue= $('.qty-input').val();
        var value = parseInt(incvalue, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $('.qty-input').val(value);
        }
    });

    $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $('#myTab a[href="#profile"]').tab('show')
    });

})

</script>
<script  type="text/javascript">
$(document).ready(function(){
    $('.featured-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots: true,
        autoplay:true,
        autoplayTimeout:1500,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
})
</script>
@endsection

