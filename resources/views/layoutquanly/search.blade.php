@extends('app.header')

@section('content')
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
            <th>Remote</th>
        </tr>
    </thead>
    <tbody>
        <?php $index = 0; ?>
        @foreach($result as $key => $item)
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
                <a href="{{ url('delete/'.$item->id) }}" class="btn btn-danger">Xóa</a>
            </td>
            <td>
            <a href="teamviewer8://remotecontrol?connectcc={{$item->idteamview}}" class="btn btn-primary">Remote</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection