@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách thư đã đọc</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form method="get" action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
                    <div class="input-group">
                        <input type="text" name="key" class="form-control bg-white border-0 small" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2" >
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <a style="float: right" class="btn btn-danger"
                   onclick="return confirm('bạn có chắc muốn xóa tất cả thư đã đọc')"
                   href="{{route('delete_all_contact')}}" >Xóa tất cả
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (session('thongbao'))
                            <div class="text-danger">{{session('thongbao')}}</div>
                        @endif
                        @foreach($listContact as $item)
                            <tr>
                                <td>#{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>0{{$item->phone}}</td>
                                <td>{{$item->email}}</td>
                                <td >
                                    <a class="btn btn-success"
                                       href="{{URL::to('admin/chi-tiet-thu-da-doc/'.$item->id)}}">Chi tiết
                                    </a>
                                    <a class="btn btn-danger"
                                       onclick="return confirm('bạn có chắc đã đọc')"
                                       href="{{URL::to('admin/xoa-lien-he/'.$item->id)}}" >Xóa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $listContact->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection