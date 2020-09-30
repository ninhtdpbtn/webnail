@extends('web.layout.index')
@section('content')
    <section class="ftco-section bg-light " >
        <div class="container" style="margin-top: -80px">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-1" style="font-size: 40px">Danh sách Sản phẩm</h2>
                </div>
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="{{route('search')}}" >
                    <div class="input-group">
                        <input type="text" name="key" value="" class="form-control bg-light border-0 small" placeholder="Tìm từ khóa..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm">Tìm kiếm</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            @if (session('thongbao'))
                <div class="text-danger">{{session('thongbao')}}</div>
            @endif
            <br>
            <p>Sản phẩm :{{count($date)}}</p>
            <div class="row d-flex">
                @foreach($date as $list)
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="{{asset('san-pham/'.$list->slug)}}" class="block-20" style="background-image: url('{{$list->image}}');width: 300px;height: 300px">
                        </a>
                        <div class="text p-4 float-right d-block">
                            <h3 class="heading mt-2"><a href="{{asset('san-pham/'.$list->slug)}}">{{$list->name_product}}</a></h3>
                            <p style="color: gold">Giá :{{ number_format($list->price, 0,'',',') }} vnđ</p>
                            <a style="float: left; width: 100px" href="{{asset('san-pham/'.$list->slug)}}" class="btn btn-primary d-block px-1 py-2">Chi tiết</a>
                            @auth
                                <a style="float: right;width: 130px" href="{{route('addbooking_gio_hang',['id'=> $list->id_product])}}" class="btn btn-primary d-block px-1 py-2">Đặt lịch</a>
                            @else
                                <a style="float: right;width: 130px" href="{{route('Home.addbooking',['id'=> $list->id_product])}}" class="btn btn-primary d-block px-1 py-2">Đặt lịch</a>
                            @endauth
                        </div>
                    </div>
                </div>
                    @endforeach
                    {!! $date->links() !!}
            </div>
        </div>
    </section>
@endsection