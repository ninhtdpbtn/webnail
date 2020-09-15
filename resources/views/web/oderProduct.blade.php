@extends('web.layout.index')
@section('content')

    {{--<div id="fb-root"></div>--}}
    {{--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=393202311285387&autoLogAppEvents=1" nonce="5RhdKPNT"></script>--}}
{{--comment facebook--}}
    {{--<section class="hero-wrap hero-wrap-2" style="background-image: url('energen/images/slide5.jpg');">--}}
        {{--<div class="overlay"></div>--}}
        {{--<div class="container">--}}
            {{--<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">--}}
                {{--<div class="col-md-9 ftco-animate text-center">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <section class="ftco-section">
        <div class="container" style="margin-top: -50px">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{$detail_product->name_product}}</h2>
                    <p>
                        <img src="/webnail/public/{{$detail_product->image}}" alt="" class="img-fluid">
                    </p>
                    <p>{{$detail_product->description}}</p>
                    <p style="color: gold">Giá :{{$detail_product->price}} vnđ</p>
                    @auth
                        <a href="{{route('addbooking_gio_hang',['id'=> $detail_product->id_product])}}" class="btn btn-primary d-block px-2 py-4">Đặt lịch</a>
                    @else
                    <a href="{{route('Home.addbooking',['id'=> $detail_product->id_product])}}" class="btn btn-primary d-block px-2 py-4">Đặt lịch</a>
                    @endauth
                    <div class="comment-form-wrap pt-5">
                        <div class="fb-comments" data-href="http://localhost/webnail/public/oderProduct/5" data-numposts="5" data-width="600"></div>
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-2">Các sản phẩm liên quan</h3>
                        @foreach($category_by_id as $list)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" href="{{asset('san-pham/'.$list->slug)}}"
                                   style="background-image: url(/webnail/public/{{$list->image}});"></a>
                                <div class="text">
                                    <h3 class="heading">
                                        <a href="{{asset('san-pham/'.$list->slug)}}">{{$list->name_product}}</a><br>
                                        <a href="{{asset('san-pham/'.$list->slug)}}">Giá: {{$list->price}}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection