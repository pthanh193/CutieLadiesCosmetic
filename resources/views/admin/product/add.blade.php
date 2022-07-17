@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Thêm sản phẩm</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <select class="form-select" name="cate_id">
                            <option value="">Chọn loại sản phẩm</option>
                        @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <select class="form-select" name="brand_id">
                            <option value="">Thương hiệu</option>
                        @foreach ($brands as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>                    

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Small description</label>
                        <textarea row="3" class="form-control" name="small_description"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea row="3" class="form-control" name="description"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Original price</label>
                        <input type="number" class="form-control" name="original_price">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Selling price</label>
                        <input type="number" class="form-control" name="selling_price">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="qty">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label  for="">Trending</label><br>
                        <input  type="checkbox" name="trending">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Ingredients</label>
                        <textarea row="3" class="form-control" name="ingredients"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Uses</label>
                        <textarea row="3" class="form-control" name="uses"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Directions</label>
                        <textarea row="3" class="form-control" name="directions"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Images</label>
                        <input type="file" class="form-control" name="image1">
                    </div>

                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="image2">
                    </div>

                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="image3">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection