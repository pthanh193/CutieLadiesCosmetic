@extends('layouts.admin')
<title>
    Admin | Thành viên
</title>
@section('content')

<div class="card">
    <div class="card-header">
        <h1>Thành viên</h1>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên thành viên</th>
                <th scope="col">Gmail</th>
            </tr>
            </thead>
            <tbody> 
                @foreach($user as $usr)
                @if($usr->role_as==0)
                <tr>
                    <td>{{$usr->id}}</td>
                    <td>{{$usr->name}}</td>
                    <td>{{$usr->email}}</td>
                    <td>
                        <a href="#" class="btn btn-danger delete" data-id="{{$usr->id}}">Xóa</a>               
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
                    window.location = "del-member/"+del+""
                    swal("Xóa tài khoản thành công.", {
                    icon: "success",
                    });
                } else {
                    swal("Tài khoản chưa được xóa!");
                }
            });
    })
})
    
</script> 
@endsection