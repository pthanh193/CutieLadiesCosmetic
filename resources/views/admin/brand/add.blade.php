@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Thêm thương hiệu</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-brand')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Origin</label>
                        <input type="text" class="form-control" name="origin">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection