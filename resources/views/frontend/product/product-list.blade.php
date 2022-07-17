@extends('layouts.frontend')
<title>
    Cutie Ladies | Sản phẩm
</title>
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Tất cả sản phẩm </h2>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($products as $prods)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                        <a href="{{url('product-detail/'.$prods->slug)}}">
                            <img src="{{asset('assets/uploads/products/'.$prods->image1)}}" alt="prod-img" class="br-img">   
                            <div class="card-body">
                                <h6 > {{$prods->name}}</h6>
                                <span class="float-start prices"> <b > {{number_format($prods->selling_price,0, ',','.')}} đ </b></span>
                                <span class="float-end" > <s>{{number_format($prods->original_price,0, ',','.')}} đ </s> </span>  
                            </div>
                        </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection