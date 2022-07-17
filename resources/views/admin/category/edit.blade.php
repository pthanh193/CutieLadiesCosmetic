@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Thay đổi thông tin loại sản phẩm</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-category/'.$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" value="{{$category->name}}" class="form-control" name="name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{$category->slug}}" class="form-control" name="slug">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea row="3" class="form-control" name="description">{{$category->description}}</textarea>
                    </div>

                    <!-- <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$category->status == "1" ? 'checked':''}} name="status">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" {{$category->popular == "1" ? 'checked':''}} name="popular">
                    </div> -->
                    
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection