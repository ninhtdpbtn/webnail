@extends('admin.layout.index')
@section('content')
    <div class="container-fluid" >
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('listProduct')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h1 class="h3 mb-2 text-gray-800">Sửa Sản phẩm</h1>
        <form method="POST" action="{{route('updateProduct' ,['id' => $pro->id_product])}}" enctype="multipart/form-data">
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
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name_product" value="{{$pro->name_product}}"  placeholder="Nhập name">
                                @error('name_product')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="price" value="{{$pro->price}}" placeholder="Nhập Price">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả</label>
                                <textarea type="text" class="form-control" name="description"  id="exampleInputEmail1" placeholder="Nhập Description" rows="10">{{$pro->description}}</textarea>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Danh mục và ảnh sản phẩm </h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Danh mục</label>
                                <select name="id_category" class="form-control" id="exampleFormControlSelect1">
                                    @foreach($data as $value)
                                        <option value="{{$value->id}}">{{$value->id}}--{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" name="image" value="{{$pro->image}}" placeholder="Nhập Image">
                                <div class="mv-5">
                                    <img src="{{$pro->image}}" style="height: 200px"; >
                                </div>
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection