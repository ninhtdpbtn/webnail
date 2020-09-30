@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>

        <!-- DataTales Example -->

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('addProduct')}}" class="btn btn-primary">Thêm</a>
                <form method="get" action="{{route('search_product')}}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
                    <div class="input-group">
                        <input type="text" name="key" class="form-control bg-white border-0 small" placeholder="Viết từ khóa tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2" >
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Giá</th>
                            <th>Ảnh</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @if (session('thongbao'))
                            <div class="text-danger">{{session('thongbao')}}</div>
                        @endif
                        <tbody>
                        @foreach($pro as $list)
                        <tr>
                            <td>#{{$list->id_product}}</td>
                            <td>{{$list->name_product}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->price}}</td>
                            <td>
                                <img src="{{$list->image}}" height="100px" width="100px">
                            </td>
                            <td >
                                <a class="btn btn-success" href="{{URL::to('admin/chi-tiet-san-pham/'.$list->id_product)}}">Chi tiết</a>
                                <a class="btn btn-warning" href="{{URL::to('admin/editProduct/'.$list->id_product)}}">Sửa</a>
                                <a class="btn btn-danger" onclick="return confirm('bạn chắc chắn muốn xóa')"
                                   href="{{URL::to('admin/deleteProduct/'.$list->id_product)}}">xóa
                                </a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $pro->links() !!}

                </div>
            </div>
        </div>

    </div>
@endsection