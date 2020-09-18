@extends('admin.layout.index')
@section('content')
    @if (session('mess'))
        <div class="btn btn-success">Xin chào {{Auth::user()->name}}</div>
    @endif

    <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Doanh thu tháng</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($total_thang, 0, '', '.')}} vnđ</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Doanh thu năm</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($total_nam, 0, '', '.')}} vnđ</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tỷ lệ hủy đơn</div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$ty_le_huy_don}}%</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{$ty_le_huy_don}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Thư chưa xem</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{($thu_chua_xem)}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->

                <div class="row">

                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tra cứu theo (D-M-Y)</h6>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('tra_cuu_don_hang')}}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="lastName" class="">Thời gian 1</label>
                                        <div class="col-10">
                                            <input value="{{ old('time_1') }}" class="form-control" name="time_1" type="date"  id="example-date-input">
                                            @error('time_1')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lastName" class="">Thời gian 2</label>
                                        <div class="col-10">
                                            <input value="{{ old('time_2') }}" class="form-control" name="time_2" type="date"  id="example-date-input">
                                            @error('time_2')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="float: right">Tra cứu</button>
                                </form>
                            </div>
                        </div>

                        <!-- Project Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tỷ lệ</h6>
                            </div>
                            <div class="card-body">
                                <h4 class="small font-weight-bold">Đơn đặt lịch chưa hoàn thành <span class="float-right">{{$ty_le_dat_lich}}%</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{$ty_le_dat_lich}}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h4 class="small font-weight-bold">Đơn đặt lịch hoàn thành <span class="float-right">{{$ty_le_dat_lich_hoan_thanh}}%</span></h4>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$ty_le_dat_lich_hoan_thanh}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><br>
                                <h4 class="small font-weight-bold">Xem thư <span class="float-right">{{$ty_le_xem_thu}}%</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar" role="progressbar" style="width: {{$ty_le_xem_thu}}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h4 class="small font-weight-bold">Hủy đơn đặt lịch<span class="float-right">{{$ty_le_huy_don}}%</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$ty_le_huy_don}}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h4 class="small font-weight-bold">Thư chưa xem<span class="float-right">{{$ty_le_thu_chua_xem}}%</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$ty_le_thu_chua_xem}}%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>
                        </div>


                        <!-- Color System -->
                    </div>

                    <div class="col-lg-6 mb-4" style="width: 900px;">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Thông tin</h6>
                            </div>
                            <div class="card-body">
                                <p>- Đơn đặt lịch : {{$don_dat_lich}}</p>
                                <p>- Đơn đặt lịch hoàn thành : {{$don_dat_lich_hoan_thanh}}</p>
                                <p>- Đơn đặt lịch đã hủy : {{$huy_dat_lich}}</p>
                                <p>- Thư chưa đọc : {{$thu_chua_xem}}</p>
                                <p>- Thư đã đọc : {{$thu_da_xem}}</p>
                                <p>- Sản phẩm đang có : {{count($product)}}</p>
                                <p>- Bài viết đã đăng : {{count($news)}}</p>
                                <p>- Bài viết chờ đăng : {{count($news_cho_dang)}}</p>
                                <p>- Chuyên gia : {{count($expert)}}</p>
                                <p>- Tài khoản người dùng : {{count($user)}}</p>
                                <p>- Danh mục sản phẩm : {{count($category_product)}}</p>
                                <p>- Danh mục bài viết : {{count($category_news)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection