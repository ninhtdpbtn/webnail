@extends('admin.layout.index')
@section('content')
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Content Row -->
            <!-- Content Row -->

            <div class="row">

                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-lg-6 mb-4">
                        <!-- Project Card Example -->
                        <h1 class="h3 mb-4 text-gray-800">Tra cứu </h1>
                        <p>(từ ngày {{$a}} đến {{$b}})</p>
                            <span class="text-danger">Không có thông tin thời gian được truyền vào</span>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tỷ lệ</h6>
                            </div>
                            <div class="card-body">
                                <h4 class="small font-weight-bold">Đơn đặt lịch hoàn thành <span class="float-right">0%</span></h4>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div><br>
                                <h4 class="small font-weight-bold">Hủy đơn đặt lịch<span class="float-right">0%</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>


                        <!-- Color System -->
                    </div>

                    <div class="col-lg-6 mb-4" style="width: 900px; margin-top: 120px">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Thông tin</h6>
                            </div>
                            <div class="card-body">
                                <p>- Đơn đặt lịch : 0</p>
                                <p>- Đơn đặt lịch hoàn thành : 0</p>
                                <p>- Đơn đặt lịch đã hủy : 0</p>
                                <p>- Thư liên hệ : 0</p>
                                <p>- Sản phẩm : 0</p>
                                <p>- Bài viết đăng : 0 </p>
                                <p>- Chuyên gia : 0</p>
                                <p>- Tài khoản người dùng thêm mới : 0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection