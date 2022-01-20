@extends('app.header')

@section('content')
<?php foreach ($info as $item) {
    $id = $item->id;
}
?>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<div>
    <h3 style="text-align: center;">Chỉnh Sửa Thông Tin</h3>
</div>
<div>
    <form action="{{ route('edit.update', $id)}}" method="post">
        @method('PATCH')
        @csrf
        @foreach($info as $key => $item)
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_id">Tên Khách Hàng:</label>
            <div class="col-md-8" style="margin-bottom: 16px;">
                <input id="tenkh" value="{{$item->tenkh}}" name="tenkh" placeholder="PRODUCT ID" class="form-control input-md" required="" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_id">Địa chỉ:</label>
            <div class="col-md-8" style="margin-bottom: 16px;">
                <input id="diachi" value="{{$item->diachi}}" name="diachi" placeholder="PRODUCT ID" class="form-control input-md" required="" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_id">Số Điện Thoại:</label>
            <div class="col-md-8" style="margin-bottom: 16px;">
                <input id="sdt" value="{{$item->phonenumber}}" name="sdt" placeholder="PRODUCT ID" class="form-control input-md" required="" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_id">ID Team View:</label>
            <div class="col-md-8" style="margin-bottom: 16px;">
                <input id="idteamview" value="{{$item->idteamview}}" name="idteam" placeholder="PRODUCT ID" class="form-control input-md" required="" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_id">Password:</label>
            <div class="col-md-8" style="margin-bottom: 16px;">
                <input id="password" value="{{$item->password}}" name="pass" placeholder="PRODUCT ID" class="form-control input-md" required="" type="text">
            </div>
        </div>
        <div class="form-group">
            <input type="submit">
        </div>
        @endforeach
    </form>
</div>

<script>
    const fileUploader = document.getElementById('sdt');

    fileUploader.addEventListener('change', (event) => {
        const vnf_regex = /((09|03)+([0-9]{8})\b)/g;
        const phone_number = $('#sdt').val();

        if(phone_number !==''){
            if (vnf_regex.test(phone_number) == false) 
            {
                alert('Số điện thoại của bạn không đúng định dạng!');
            }
        }
    })
</script>
@endsection