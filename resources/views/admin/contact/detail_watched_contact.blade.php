@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('watched_contact')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
        <h1 class="h3 mb-4 text-gray-800">Chi tiết liên hệ</h1>
        <div class="row">
            <div class="col-lg-6">
                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin khách hàng</h6>
                    </div>
                    <div class="card-body">
                        <span style="font-weight: bold">- ID : #{{$listContact->id}}</span><br>
                        <span>- Tên người liên hệ :{{$listContact->name}}</span><br>
                        <span>- Số điện thoại : {{$listContact->phone}}</span><br>
                        <span>- Email : {{$listContact->email}}</span><br>
                        <span>- Thời gian : {{$listContact->created_at}}</span><br>
                    </div>
                </div>
                <!-- Brand Buttons -->
            </div>
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Nôi dung </h6>
                    </div>
                    <div class="card-body">
                        <p>{{$listContact->detail}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection