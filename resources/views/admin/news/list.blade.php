@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách bài viết</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('addNews')}}" class="btn btn-primary">Thêm</a>
                <form method="get" action="{{route('search_news')}}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
                    <div class="input-group">
                        <input type="text" name="key" class="form-control bg-white border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" >
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
                            <th>Tiêu đề</th>
                            <th>Danh mục</th>
                            <th>Ảnh</th>
                            <th>Tiêu đề ngắn</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pro as $list)
                            <tr>
                                <td>#{{$list->id}}</td>
                                <td>{{$list->title}}</td>
                                <td>{{$list->name}}</td>
                                <td>
                                    <img src="/webnail/public/{{$list->image}}" height="100px" width="100px">
                                </td>
                                <td>{{$list->short_title}}</td>
                                <td >
                                    <a class="btn btn-success" href="{{URL::to('admin/chi-tiet-bai-viet/'.$list->id)}}">Chi tiết</a>
                                    <a class="btn btn-warning" href="{{URL::to('admin/editNews/'.$list->id)}}">Sửa</a>
                                    <a class="btn btn-danger" onclick="return confirm('bạn chắc chắn muốn xóa')"
                                       href="{{URL::to('admin/deleteNews/'.$list->id)}}">xóa
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