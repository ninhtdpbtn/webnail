@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('listExpert')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h1 class="h3 mb-2 text-gray-800">Sửa chuyên gia</h1>
        <form method="post" action="{{route('updateExpert',['id' => $pro->id])}}"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Thông tin</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên chuyên gia</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$pro ->name}}"  placeholder="Nhập name">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chức vụ</label>
                                    <input type="Text" class="form-control" id="exampleInputEmail1" name="location"  value="{{$pro ->location}}" placeholder="Nhập Location">
                                    @error('location')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Ảnh đại diện</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="form-group">
                                <input type="file" class="form-control" id="exampleInputEmail1" value="{{$pro ->avatar}}" name="avatar"  placeholder="Nhập Image">
                                <div class="mv-5">
                                    <img src="{{$pro->avatar}}" style="height: 200px"; >
                                </div>
                                @error('avatar')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
@endsection