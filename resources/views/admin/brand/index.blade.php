@extends('layouts.admin')
<title>
    Admin | Thương hiệu
</title>
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Thương hiệu</h1> 
                </div>
                <div class="col-md-6" style="text-align:right">
                    <a href="{{ url('add-brand') }}" class="btn btn-success ">Thêm thương hiệu</a>
                </div>
            </div>
           
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên thương hiệu</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Xuất xứ</th>
                    <th scope="col" ></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($brands as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <img src="{{asset('assets/uploads/brands/'.$item->image)}}" class="br-img">
                        </td>
                        <td>{{$item->origin}}</td>
                        <td >
                            <a href="{{ url('edit-brand/'.$item->id) }}" class="btn btn-primary">Sửa</a>
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
                    window.location = "del-brand/"+del+""
                    swal("Xóa thương hiệu thành công.", {
                    icon: "success",
                    });
                } else {
                    swal("Thương hiệu chưa được xóa!");
                }
            });
    })
})
    
</script>    
@endsection

