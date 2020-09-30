@extends('web.layout.index')
@section('content')
    <section class="hero-wrap js-fullheight" style="background-image: url('energen/images/bg_1.jpg');" >
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-10 ftco-animate text-center">
                    <div class="icon">
                        <span class="flaticon-lotus"></span>
                    </div>
                    <h1>Nails &amp; Beauty Center</h1>
                    <div class="row justify-content-center">
                        <div class="col-md-7 mb-3">
                            <p>Không có phụ nữ xấu<br>Chỉ có phụ nữ không biết làm đẹp</p>
                        </div>
                    </div>
                    <p>
                        <a href="{{route('products')}}" class="btn btn-primary p-3 px-5 py-4 mr-md-2">Danh sách các dịch vụ</a>
                        <a href="{{route('contact')}}" class="btn btn-outline-primary p-3 px-5 py-4 ml-md-2">Liên Hệ</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-intro" style="background-image: url(energen/images/intro.jpg);">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div class="heading-section ftco-animate">
                        <h2 class="mb-4">Những lợi ích của việc làm Nail</h2>
                    </div>
                    <ul class="mt-5 do-list">
                        <li class="ftco-animate"><a href="#"><span class="ion-ios-checkmark-circle mr-3"></span>Giúp bạn có những móng tay, móng chân xinh, đẹp, cá tính hoặc dễ thương. </a></li>
                        <li class="ftco-animate"><a href="#"><span class="ion-ios-checkmark-circle mr-3"></span>Che khuyết điểm ở móng tay, móng chân một cách dễ dàng, đẹp.</a></li>
                        <li class="ftco-animate"><a href="#"><span class="ion-ios-checkmark-circle mr-3"></span>Làm móng sẽ giúp bạn đẹp hơn, sang hơn khi kết hợp với những bộ đầm, váy hoặc quần jean</a></li>
                        <li class="ftco-animate"><a href="#"><span class="ion-ios-checkmark-circle mr-3"></span>Giúp bạn tự tin, năng động hơn.</a></li>
                        <li class="ftco-animate"><a href="#"><span class="ion-ios-checkmark-circle mr-3"></span>Ngón chân, ngón tay của bạn nhìn sẽ thon, dài đẹp hơn.</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>




    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-1">Các mẫu Nail hot</h2>
                </div>
            </div>

            <div class="row d-flex">
                @foreach($product as $list)
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="{{asset('san-pham/'.$list->slug)}}" class="block-20" style="background-image: url('{{$list->image}}');width: 400px;height: 400px"></a>
                        <div class="text p-4 float-right d-block">
                            <h3 class="heading mt-2"><a href="{{asset('san-pham/'.$list->slug)}}" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">{{$list->name_product}}</a></h3>
                            <p style="color: gold">Giá :{{ number_format($list->price, 0,'',',') }} vnđ</p>
                            <a href="{{asset('san-pham/'.$list->slug)}}" class="btn btn-primary d-block px-2 py-4">Chi tiết</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-1">Combo dịch vụ</h2>
                </div>
            </div>
            <div class="row">
                @foreach($combo as $value)
                <div class="col-md-4 ftco-animate">
                    <div class="block-7">
                        <div class="text-center">
                            <h2 class="heading" style="font-size: 150%">{{$value->name_product}}</h2>
                            <span class="price"><span class="number">{{ number_format($value->price, 0,'',',') }}</span><sup>VNĐ</sup> </span>
                            <h3 class="heading-2 my-4">Gồm các dịch vụ</h3>
                            <ul class="pricing-text mb-5">
                                <li>{{$value->description}}</li>
                            </ul>
                            @auth
                                <a href="{{route('addbooking_gio_hang',['id'=> $value->id_product])}}" class="btn btn-primary d-block px-2 py-4">Đặt lịch</a>
                            @else
                                <a href="{{route('Home.addbooking',['id'=> $value->id_product])}}" class="btn btn-primary d-block px-2 py-4">Đặt lịch</a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-1">Bài viết gần đây</h2>
                </div>
            </div>

            <div class="row d-flex">
                @foreach($news as $list)
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="{{asset('bai-viet/'.$list->slug)}}" class="block-20" style="background-image: url('{{$list->image}}');height: 400px;width: 400px"></a>
                        <div class="text p-4 float-right d-block">
                            <h3 class="heading mt-2"><a href="{{asset('bai-viet/'.$list->slug)}}">{{$list->title}} </a></h3>
                            <p>{{$list->short_title}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection