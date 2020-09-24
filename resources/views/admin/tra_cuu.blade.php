@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thông tin tìm kiếm từ {{$a}} đến {{$b}}</h1>
            <form method="POST" action="{{URL::to('admin/export_booking_product/'.$a,$b)}}">
                @csrf
                <input type="submit" value="Export excel" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            </form>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID_booking</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Chuyên gia</th>
                            <th>Email</th>
                            <th>Id_user</th>
                            <th>Thời gian hẹn</th>
                            <th>Yêu cầu</th>
                            <th>Tên sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Thời gian đặt</th>
                            <th>Thời cập nhật</th>
                            <th>Trạng thái</th>
                        </tr>
                        </thead>
                        @foreach($booking as $value)
                        <tbody>
                            <tr>
                                <td>{{$value->id_booking}}</td>
                                <td>{{$value->name_booking}}</td>
                                <td>{{$value->id_expert}}</td>
                                <td>{{$value->phone_booking}}</td>
                                <td>{{$value->email_booking}}</td>
                                <td>{{$value->id_user}}</td>
                                <td>{{$value->time_booking}}</td>
                                <td>{{$value->description_booking}}</td>
                                <td>
                                    <img src="/webnail/public/{{$value->image_booking}}" height="100px" width="100px">
                                </td>
                                <td>{{$value->name_product}}</td>
                                <td>{{$value->price}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>{{$value->updated_at}}</td>
                                <td>
                                    {{ $value->status_booking_product == 1 ? 'Đặt lịch': '' }}
                                    {{ $value->status_booking_product == 2 ? 'Hoàn thành' : '' }}
                                    {{ $value->status_booking_product == 3 ? 'Đã hủy' : '' }}
                                    {{ $value->status_booking_product == 4 ? 'Đã xóa' : '' }}
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    {!! $booking->links() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
