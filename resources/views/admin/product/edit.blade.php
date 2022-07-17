@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Thay đổi thông tin sản phẩm</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-product/'.$products->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Loại sản phẩm</label>
                            <select class="form-select">
                                <option value="">{{$products->category->name}}</option>
                            </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="">Thương hiệu</label>
                            <select class="form-select">
                                <option value="">{{$products->brand['name']}}</option>
                            </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$products->name}}" name="name">
                    </div>                    

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{$products->slug}}" name="slug">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Small description</label>
                        <textarea row="3" class="form-control" name="small_description">{{$products->small_description}}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea row="3" class="form-control" name="description">{{$products->description}}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Original price</label>
                        <input type="number" class="form-control" value="{{$products->original_price}}" name="original_price">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Selling price</label>
                        <input type="number" class="form-control" value="{{$products->selling_price}}" name="selling_price">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" value="{{$products->qty}}" name="qty">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label  for="">Trending</label><br>
                        <input  type="checkbox" {{$products->trending == "1" ? 'checked':''}} name="trending">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Ingredients</label>
                        <textarea row="3" class="form-control" name="ingredients">{{$products->ingredients}}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Uses</label>
                        <textarea row="3" class="form-control" name="uses">{{$products->uses}}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Directions</label>
                        <textarea row="3" class="form-control" name="directions">{{$products->directions}}</textarea>
                    </div>

                    @if($products->image1)
                        <img src="{{asset('assets/uploads/products/'.$products->image1)}}" alt="">
                    @endif
                    <div class="col-md-12 mb-3">
                        <label for="">Images</label>
                        <input type="file" class="form-control" name="image1">
                    </div>

                    @if($products->image2)
                        <img src="{{asset('assets/uploads/products/'.$products->image2)}}" alt="">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="image2">
                    </div>

                    @if($products->image3)
                        <img src="{{asset('assets/uploads/products/'.$products->image3)}}" alt="">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="image3">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection