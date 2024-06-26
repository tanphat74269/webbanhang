@extends('frontend.master')
@section('title', 'Đổi tên và avatar')
@section('main')
<h1 style="color: black;">Đổi tên và avatar</h1>
<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên</label>
      <input type="text" name="name" value="{{$name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label>Avatar</label>
        <input id="img" type="file" name="img" class="form-control" onchange="changeImg(this)">
        <img id="avatar" class="thumbnail" width="200px" height="200px" src="{{asset('./storage/images/user/'.$avatar)}}">
    </div>
    <button style="cursor: pointer;" type="submit" class="btn btn-primary">Thay đổi</button>
    {{ csrf_field() }}  
</form>
  
@stop