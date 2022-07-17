@extends('layouts.frontend')
<title>
    Cutie Ladies | Thương hiệu
</title>
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Thương hiệu</h2>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($brands as $brs)
                    <div class="col-md-3 mb-3">
                        <a href="{{url('brand/'.$brs->slug)}}">
                            <img src="{{asset('assets/uploads/brands/'.$brs->image)}}" alt="brand-img" class="br-img">   
                            <div class="card-body">
                                <h5 style="text-align: center"> <b>{{$brs->name}}</b> </h5>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection