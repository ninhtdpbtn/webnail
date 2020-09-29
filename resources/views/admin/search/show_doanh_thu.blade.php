@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thông tin tìm kiếm từ {{$a}} đến {{$b}}</h1>
            <form method="POST" action="{{URL::to('admin/export_doanh_thu/'.$a,$b)}}">
                @csrf
                <input type="submit" value="Export excel" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            </form>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
{{--                    <p>Tìm thấy :{{count($doanhThuNgay)}} </p>--}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Ngày</th>
                            <th>Ngày</th>
                            <th>Doanh thu</th>
                            <th>Số đơn</th>
                        </tr>
                        </thead>
                        @foreach($summaryPerDay as $key => $value)
                        <tbody>
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$value->date}}</td>
                            <td>{{number_format($value->price)}} Vnđ</td>
                            <td>{{$value->product}} Đơn</td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
