@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách chuyên gia</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('addExpert')}}" class="btn btn-primary">Thêm</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên chuyên gia</th>
                            <th>Ảnh đại diện</th>
                            <th>Chức vụ</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($expert as $list)
                            <td>{{$list->id}}</td>
                            <td>{{$list->name}}</td>
                                <td>
                                    <img src="{{$list->avatar}}" height="100px" width="100px">
                                </td>
                            <td>{{$list->location}}</td>
                            <td >
                                <a class="btn btn-warning" href="{{URL::to('admin/editExpert/'.$list->id)}}">Sửa</a>
                                <a class="btn btn-danger" onclick="return confirm('bạn chắc chắn muốn xóa')"  href="{{URL::to('admin/deleteExpert/'.$list->id)}}">Xóa</a>
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