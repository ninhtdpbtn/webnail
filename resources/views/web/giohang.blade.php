@extends('web.layout.index')
@section('content')
    <section class="ftco-section bg-light" >
        <div class="container grid-main" style="margin-top: -60px">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h3 class="mb-1">Danh sách giỏ hàng</h3>
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
                            @auth
                                @if (session('mess'))

                                    <div style="background-color: green;" class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="2000">
                                        <div style="color: white" role="alert" aria-live="assertive" aria-atomic="true">{{session('mess')}}</div>
                                    </div>
                                @endif
                                @if (session('thongbao'))
                                        <div style="background-color: red;" class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="2000">
                                            <div style="color: white" role="alert" aria-live="assertive" aria-atomic="true">{{session('thongbao')}}</div>
                                        </div>
                                @endif
                            @foreach($user_product as $value)
                                <tr>
                                    <td class="pink font-bold font-20">{{$value->name_product}}</td>
                                    <td class="pink font-bold font-20">
                                        <img src="{{$value->image}}" height="100px" width="100px">
                                    </td>
                                    <td class="pink font-bold font-20">{{number_format($value->price, 0, '', '.')}}</td>
                                    <td>
                                        <a onclick="return confirm('bạn chắc chắn muốn xóa')"
                                           href="{{route('delete_gio_hang',['id'=>$value->id_product])}}"
                                           class="btn btn-danger ">Xóa
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                @if (session('mess'))
                                    <div style="background-color: green;" class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="2000">
                                        <div style="color: white" role="alert" aria-live="assertive" aria-atomic="true">{{session('mess')}}</div>
                                    </div>
                                @endif
                                @if (session('thongbao'))
                                    <div style="background-color: red;" class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="2000">
                                        <div style="color: white" role="alert" aria-live="assertive" aria-atomic="true">{{session('thongbao')}}</div>
                                    </div>
                                @endif
                            @foreach($listSP as $item)
                                <tr>
                                    <td class="pink font-bold font-20">{{$item->name_product}}</td>
                                    <td class="pink font-bold font-20">
                                        <img src="{{$item->image}}" height="100px" width="100px">
                                    </td>
                                    <td class="pink font-bold font-20">{{number_format($item->price, 0, '', '.')}}</td>
                                    <td>
                                        <a onclick="return confirm('bạn chắc chắn muốn xóa')"
                                           href="{{route('Home.remove',['id'=>$item->id_product])}}"
                                           class="btn btn-danger ">Xóa
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @endauth
                            </tbody>
                        </table>
                        @auth
                            <a name="" id="" class="btn btn-primary" href="{{route('datlich_user')}}" role="button">Đặt Lịch</a>
                        @else
                            <a name="" id="" class="btn btn-primary" href="{{route('datlich')}}" role="button">Đặt Lịch</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        $('.toast').toast('show')
    </script>
@endsection
