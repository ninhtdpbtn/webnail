@extends('web.layout.index')
@section('content')
    <section class="ftco-section bg-light">
        <div class="container grid-main" style="margin-top: -60px">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-1" style="font-size: 40px">Danh sách đặt lịch </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive wow bounceInUp" data-wow-duration="2s">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Mã đơn</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Mẫu riêng</th>
                                <th>Chuyên gia</th>
                                <th>Thời gian làm</th>
                                <th>Yêu cầu</th>
                                <th>Tên sản phẩm</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (session('thongbao'))
                                <div class="text-danger">{{session('thongbao')}}</div>
                            @endif
                            @foreach($list as $item)
                                <tr>
                                    <td>#{{$item->id_booking}}</td>
                                    <td>{{$item->name_booking}}</td>
                                    <td>0{{$item->phone_booking}}</td>
                                    <td><img src="/webnail/public/{{$item->image_booking}}" height="100px" width="100px"></td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->time_booking}}</td>
                                    <td>{{$item->description_booking}}</td>
                                    <td>{{$item->name_product}}</td>
                                    <td>
                                        <a class="btn btn-danger"
                                           href="{{URL::to('detlete_booking_user/'.$item->id_product,$item->id_booking)}}"
                                           onclick="return confirm('bạn chắc chắn muốn xóa')">Xóa
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
