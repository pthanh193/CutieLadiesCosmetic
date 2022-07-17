@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Thay đổi thông tin thương hiệu</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-brand/'.$brands->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$brands->name}}" name="name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{$brands->slug}}" name="slug">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Origin</label>
                        <input type="text" class="form-control" value="{{$brands->origin}}" name="origin">
                    </div>

                    @if($brands->image)
                        <img src="{{asset('assets/uploads/brands/'.$brands->image)}}" alt="">
                    @endif
                    <div class="col-md-12 mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection