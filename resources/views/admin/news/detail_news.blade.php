@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Chi tiết bài viết</h1>

        <div class="row">

            <div class="col-lg-6">

                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin</h6>
                    </div>
                    <div class="card-body">
                        <span style="font-weight: bold">- ID : #{{$detail_news->id}}</span><br>
                        <span >- Tiêu đề : {{$detail_news->title}}</span><br>
                        <span >- Tên danh mục : {{$detail_news->name}}</span><br>
                        <span >- Tiêu đề ngắn : {{$detail_news->short_title}}</span><br>
                        <span >- Trạng thái :
                        @if($detail_news->status == 1)
                            Bài viết đã đăng
                        @elseif($detail_news->status == 2)
                            Bài viết chờ đăng
                        @endif
                        </span>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ảnh</h6>
                    </div>
                    <div class="card-body">
                        <span>
                        <img src="{{$detail_news->image}}" height="400px" width="480px">
                        </span>
                    </div>
                </div>

            </div>
            <div class="col-lg-12">
                <!-- Brand Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Nội dung</h6>
                    </div>
                    <div class="card-body">
                        <p>{!!$detail_news->details!!}</p>
                    </div>
                </div>

            </div>

        </div>
@endsection