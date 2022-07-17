@extends('layouts.admin')
<title>
    Admin | Sản phẩm
</title>
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Sản phẩm</h1>  
                </div>
                <div class="col-md-6" style="text-align:right">
                    <a href="{{ url('add-product') }}" class="btn btn-success ">Thêm sản phẩm</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <table class="table">
                <thead style="text-align:center;">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Thương hiệu </th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Giá gốc (VND)</th>
                    <th scope="col">Giá bán (VND)</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td style="width:150px;text-align:justify ">{{$item->name}}</td>
                        <td style="text-align: center">{{$item->brand['name']}}</td>

                        <td>
                            <img src="{{asset('assets/uploads/products/'.$item->image1)}}" class="cus-img">
                        </td>
                        <td style="text-align: center">{{number_format($item->original_price,0, ',','.')}} </td>
                        <td style="text-align: center"> {{number_format($item->selling_price,0, ',','.')}} </td>
                        <td style="width:280px; text-align:justify ">{{$item->small_description}}</td>
                        <td style="width:110px;text-align:center; ">
                            <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary">Sửa</a>
                            <br> <br>
                            <a href="#" class="btn btn-danger delete" data-id="{{$item->id}}">Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>   

<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.delete').click(function(){
        var del = $(this).attr('data-id');
        swal({
            title: "Bạn chắc chắn muốn xóa không?",
            text: "Bạn sẽ không thể khôi phục được dữ liệu đã xóa!",
            icon: "warning",
            buttons: ["Hủy", "Xóa"],
            dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "del-product/"+del+""
                    swal("Xóa sản phẩm thành công.", {
                    icon: "success",
                    });
                } else {
                    swal("Sản phẩm chưa được xóa!");
                }
            });
    })
})
</script>
@endsection

