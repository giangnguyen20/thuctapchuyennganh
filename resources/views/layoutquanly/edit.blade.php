@extends('app.header')

@section('content')
<form action="{{ URL::to('/search')}}" method="post">
    {{ csrf_field() }}
    <input type="text" style="margin-bottom: 12px;" name="keysearch" placeholder="search">
    <input type="submit" value="search">
</form>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th width="50px">STT</th>
            <th>Tên khách hàng</th>
            <th>SĐT</th>
            <th>IDTeamView</th>
            <th>Password</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php $index = 0; $id = ""?>
        @foreach($listid as $key => $item)
        <?php $index++; ?>
        <tr>
            <td>{{$index}}</td>
            <td>{{$item->tenkh}}</td>
            <td>{{$item->phonenumber}}</td>
            <td>{{$item->idteamview}}</td>
            <td>{{$item->password}}</td>
            <td>
                <a href="{{ url('chinhsua/'.$item->id) }}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <!-- <a href="{{ url('delete/'.$item->id) }}" class="btn btn-danger">Xóa</a> -->
                <?php 
                    $id = $item->id;
                    echo '<button onclick="showmessage('.$id.')" class="btn btn-danger">Xóa</button>';
                ?>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
    {{ $listid->links() }}
</div>
<script>
    function showmessage(id){
        if(confirm("Bạn thật sự muốn xóa?")){
            url = 'delete/' + id;
            $.get(url, function(data){
                location.reload();
            });
        }
    }
</script>
@endsection