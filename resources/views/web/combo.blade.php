@extends('web.layout.index')
@section('content')

    {{--<section class="hero-wrap hero-wrap-2" style="background-image: url('energen/images/slide5.jpg');" >--}}
        {{--<div class="overlay"></div>--}}
        {{--<div class="container">--}}
            {{--<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">--}}
                {{--<div class="col-md-9 ftco-animate text-center">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    <section class="ftco-section bg-light">
        <div class="container" style="margin-top: -80px">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-1" style="font-size: 40px">Combo dịch vụ</h2>
                </div>
            </div>
            <div class="row">
                @foreach($combo as $list)
                    <div class="col-md-4 ftco-animate">
                        <div class="block-7">
                            <div class="text-center">
                                <h2 class="heading" style="font-size: 150%">{{$list->name_product}}</h2>
                                <span class="price"><span class="number">{{$list->price}}</span><sup>VNĐ</sup> </span>
                                <h3 class="heading-2 my-4">Gồm các dịch vụ</h3>
                                <ul class="pricing-text mb-5">
                                    <li>{{$list->description}}</li>
                                </ul>
                                @auth
                                    <a href="{{route('addbooking_gio_hang',['id'=> $list->id_product])}}" class="btn btn-primary d-block px-2 py-4">Đặt lịch</a>
                                @else
                                    <a href="{{route('Home.addbooking',['id'=> $list->id_product])}}" class="btn btn-primary d-block px-2 py-4">Đặt lịch</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection