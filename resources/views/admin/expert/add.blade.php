@extends('admin.layout.index')
@section('content')
    <div class="container-fluid" style="width: 700px; float: left;">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('listExpert')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
        <h1 class="h3 mb-2 text-gray-800">Thêm thông tin chuyên gia</h1>
        <form method="post" action="{{route('saveExpert')}}"  enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Tên chuyên gia</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name"  placeholder="Nhập name" value="{{ old('name') }}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh đại diện</label>
                <input type="file" class="form-control" id="exampleInputEmail1" name="avatar"  placeholder="Nhập Image" value="{{ old('image') }}">
                @error('avatar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Chức vụ</label>
                <input type="Text" class="form-control" id="exampleInputEmail1" name="location"  placeholder="Nhập Location" value="{{ old('location') }}">
                @error('location')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>

    </div>
@endsection