@extends('layouts.admin')
<title>
    Admin | Đánh giá
</title>
@section('content')

<div class="card">
    <div class="card-header">
        <h1>Đánh giá</h1>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Nội dung</th>
            </tr>
            </thead>
            <tbody> 
                @foreach($review as $rev)
                @if($rev->role_as==0)
                <tr>
                    <td>{{$rev->id}}</td>
                    <td>{{$rev->user['name']}}</td>
                    <td>{{$rev->products['name']}}</td>
                    <td>{{$rev->user_review}}</td>
                    <td>
                        <a href="#" class="btn btn-danger delete" data-id="{{$rev->id}}">Xóa</a>               
                    </td>
                </tr>
                @endif
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
                    window.location = "del-review/"+del+""
                    swal("Xóa đánh giá thành công.", {
                    icon: "success",
                    });
                } else {
                    swal("Đánh giá chưa được xóa!");
                }
            });
    })
})
    
</script> 
@endsection