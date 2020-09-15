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

    <section class="ftco-section">
        <div class="container" style="margin-top: -80px">
            <div class="row justify-content-center mb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-1" style="font-size: 40px">Các chuyên gia Nail chúng tôi</h2>
                </div>
            </div>
            <div class="row">

                @foreach($expert as $list)
                <div class="col-lg-3 d-flex">
                    <div class="coach align-items-stretch">
                        <div class="img" style="background-image: url('/webnail/public/{{$list->avatar}}');"></div>
                        <div class="text bg-white p-4 ftco-animate">
                            <span class="subheading">{{$list->location}}</span>
                            <h3><a >{{$list->name}}</a></h3>
                            <p></p>
                        </div>
                    </div>
                </div>
                    @endforeach

            </div>
        </div>
    </section>
    @endsection