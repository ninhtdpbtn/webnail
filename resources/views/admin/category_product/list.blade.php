@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Danh Mục</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addCategory')}}" class="btn btn-primary">Thêm</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category_product as $list)

                    <tr>
                        <td>#{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td >
                            <a class="btn btn-warning" href="{{URL::to('admin/editCategory/'.$list->id)}}">Sửa</a>
                            <a class="btn btn-danger" onclick="return confirm('bạn chắc chắn muốn xóa')"  href="{{URL::to('admin/deleteCategory/'.$list->id)}}">Xóa</a>
                        </td>
                    </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection