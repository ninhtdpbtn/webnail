@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách đặt lịch</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form method="get" action="{{route('search_booking')}}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
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
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Ảnh</th>
                            <th>Id_user</th>
                            <th>Thời gian hẹn</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>#{{$item->id_booking}}</td>
                                <td>{{$item->name_booking}}</td>
                                <td>0{{$item->phone_booking}}</td>
                                <td>{{$item->email_booking}}</td>
                                <td>
                                    <img src="{{$item->image_booking}}" style="height: 100px"; >
                                </td>
                                <td>{{$item->id_user}}</td>
                                <td>{{$item->time_booking}}</td>
                                <td>{{$item->name_product}}</td>
                                <td>{{$item->price}}</td>
                                <td >
                                    <a class="btn btn-success"
                                       href="{{URL::to('admin/updateBooking/'.$item->id_product,$item->id_booking)}}">Hoàn thành
                                    </a>
                                    <a class="btn btn-danger"
                                        href="{{URL::to('admin/deleteBooking/'.$item->id_product,$item->id_booking)}}"
                                        onclick="return confirm('bạn có chắc chắc hủy đơn đặt lịch')">Hủy
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {!! $data->links() !!}

                </div>
            </div>
        </div>

    </div>
@endsection