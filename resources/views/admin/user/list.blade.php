@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách tài khoản</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('addUser')}}" class="btn btn-primary">Thêm</a>
                <form method="get" action="{{route('search_user')}}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
                    <div class="input-group">
                        <input type="text" name="key" class="form-control bg-white border-0 small" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2" >
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
                            <th>Tên tài khoản</th>
                            <th>Email</th>
                            <th>Ảnh đại diện</th>
                            <th>Quê quán</th>
                            <th>Số điện thoại</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $list)
                        <tr>
                            <td>#{{$list->id}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->email}}</td>
                            <td>
                                <img src="{{$list->image}}" height="100px" width="100px">
                            </td>
                            <td>{{$list->address}}</td>
                            <td>{{$list->phone}}</td>
                            <td >
                                <a class="btn btn-warning" href="{{URL::to('admin/editUser/'.$list->id)}}">Sửa</a>
                                <a class="btn btn-danger" onclick="return confirm('bạn chắc chắn muốn xóa')"  href="{{URL::to('admin/deleteUser/'.$list->id)}}">Xóa</a>
                            </td>
                        </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {!!$user->links()!!}
                </div>
            </div>
        </div>

    </div>
@endsection