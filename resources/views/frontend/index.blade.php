@extends('layouts.frontend')
@section('content')
@include('layouts.inc.frontendslider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Sản phẩm thịnh hành</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                @foreach($featured_products as $prod)
                    <div class="item">
                        <div class="card">
                            <a class="prod-link" href="{{url('product-detail/'.$prod->slug)}}">
                                <img src="{{asset('assets/uploads/products/'.$prod->image1)}}" alt="product-img">
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
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}" defer></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}" defer></script>
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