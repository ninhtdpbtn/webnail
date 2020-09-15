@extends('admin.layout.index')
@section('content')
    <div class="container-fluid" style="width: 700px; float: left;">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('listProduct')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h1 class="h3 mb-2 text-gray-800">Sửa Product</h1>
        <form method="POST" action="{{route('updateProduct' ,['id' => $pro->id_product])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name_product" value="{{$pro->name_product}}"  placeholder="Nhập name">
                @error('name_product')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh</label>
                <input type="file" class="form-control" id="exampleInputEmail1" name="image" value="/webnail/public/{{$pro->image}}" placeholder="Nhập Image">
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Danh mục</label>
                <select name="id_category" class="form-control" id="exampleFormControlSelect1">
                    @foreach($data as $value)
                        <option value="{{$value->id}}">{{$value->id}}--{{$value->name}}</option>
                    @endforeach
                </select>
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
                <input type="text" class="form-control" name="description" value="{{$pro->description}}" id="exampleInputEmail1" placeholder="Nhập Description">
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>

    </div>
@endsection