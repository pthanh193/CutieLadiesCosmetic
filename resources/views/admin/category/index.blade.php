@extends('layouts.admin')
<title>
    Admin | Loại sản phẩm
</title>
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Loại sản phẩm</h1>
                </div>
                <div class="col-md-6" style="text-align:right">
                    <a href="{{ url('add-category') }}" class="btn btn-success ">Thêm loại sản phẩm</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <table class="table">
                <thead style="text-align:center;">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col" style="width:170px;text-align:left;">Tên loại SP</th>
                    <th style="text-align:left;" scope="col">Mô tả</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody >
                    @foreach($category as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td >{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td style="width:200px;text-align:center;"> 
                            <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-primary">Sửa</a>
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
                    window.location = "del-category/"+del+""
                    swal("Xóa loại sản phẩm thành công.", {
                    icon: "success",
                    });
                } else {
                    swal("Loại sản phẩm chưa được xóa!");
                }
            });
    })
})
    
</script>    
@endsection

