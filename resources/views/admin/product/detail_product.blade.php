@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('listProduct')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
        <h1 class="h3 mb-4 text-gray-800">Chi tiết sản phẩm</h1>

        <div class="row">

            <div class="col-lg-6">

                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
                    </div>
                    <div class="card-body">
                        <span style="font-weight: bold">- ID : #{{$product->id_product}}</span><br>
                        <span>- Tên sản phẩm :{{$product->name_product}}</span><br>
                        <span>- Tên danh mục :{{$product->name}}</span><br>
                        <span>- Giá : {{$product->price}}</span><br>
                        <span>- Thời gian thêm : {{$product->created_at}}</span><br>
                        <span>- Cập nhật mới nhất : {{$product->updated_at}}</span><br>
                        <span>
                            <img src="{{$product->image}}" height="450px" width="450px">
                        </span><br>
                    </div>
                </div>

                <!-- Brand Buttons -->


            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Mô tả sản phẩm </h6>
                    </div>
                    <div class="card-body">
                        <p>{{$product->	description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection