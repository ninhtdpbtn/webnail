@extends('web.layout.index')
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('energen/images/slide5.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container grid-main">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-1">Danh sách giỏ hàng</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive wow bounceInUp" data-wow-duration="2s">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width:17%">Tên sản phẩm</th>
                                <th style="width:14%">Ảnh</th>
                                <th style="width:6%">Giá</th>
                                <th style="width:1%">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total = 0;
                            @endphp
                                @foreach($listSP as $item)
                                    <tr>
                                        <td class="pink font-bold font-20">{{$item->name}}</td>
                                        <td class="pink font-bold font-20">
                                        </td>
                                        <td class="pink font-bold font-20">{{number_format($item->price, 0, '', '.')}}</td>
                                        <td>
                                            <a onclick="return confirm('bạn chắc chắn muốn xóa')"
                                               href="{{route('Home.remove',['id'=>$item->id])}}"
                                               class="btn btn-danger ">Xóa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a name="" id="" class="btn btn-primary" href="{{route('datlich_combo')}}" role="button">Đặt Lịch </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
