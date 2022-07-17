@extends('layouts.frontend')
<title>
    Cuties Ladies | {{$category->name}}
</title>

@section('content')
<!-- <nav aria-label="breadcrumb" style="padding-left:40px">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$category->name}} </li>
  </ol>
</nav> -->
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{$category->name}}</h2>
            <div class="col-md-12">
                <div class="row">
                @foreach ($products as $prods)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{url('product-detail/'.$prods->slug)}}">
                                <img src="{{asset('assets/uploads/products/'.$prods->image1)}}" alt="prod-brand-img" class="prod-brand-img">   
                                <div class="card-body">
                                    <h5>{{$prods->name}}</h5>
                                    <span class="float-start prices"> <b> {{number_format($prods->selling_price,0, ',','.')}} đ</b></span>
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