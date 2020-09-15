@extends('admin.layout.index')
@section('content')
    <div class="container-fluid" style="width: 700px; float: left;">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('listProduct')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
        <h1 class="h3 mb-2 text-gray-800">Thêm Product</h1>
        <form method="POST" action="{{route('saveProduct')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name_product"  placeholder="Nhập name" value="{{ old('name') }}">
                @error('name_product')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                <input type="file" class="form-control" id="exampleInputEmail1" name="image"  placeholder="Nhập Image">
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Danh mục sản phẩm</label>
                <select name="id_category" class="form-control" id="exampleFormControlSelect1">
                    @foreach($data as $pro)
                        <option value="{{$pro->id}}">{{$pro->id}}--{{$pro->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá</label>
                <input type="number" class="form-control" id="exampleInputEmail1"  name="price" placeholder="Nhập Price" value="{{ old('price') }}">
                @error('price')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="description" placeholder="Nhập Description" value="{{ old('description') }}">
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>

    </div>
@endsection