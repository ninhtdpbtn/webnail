@extends('web.layout.index')
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('energen/images/slide5.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-1">Tìm kiếm</h2>
                </div>
            </div>
            <div class="row d-flex">
                <p>Tìm thấy : {{count($product)}}</p>
            </div>
            <div class="row d-flex">
                @foreach($product as $list)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="{{asset('san-pham/'.$list->slug)}}" class="block-20" style="background-image: url('/webnail/public/{{$list->image}}');width: 300px;height: 300px">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <h3 class="heading mt-2"><a href="{{asset('san-pham/'.$list->slug)}}">{{$list->name_product}}</a></h3>
                                <p style="color: gold">Giá :{{$list->price}} vnđ</p>
                                <a href="{{asset('san-pham/'.$list->slug)}}" class="btn btn-primary d-block px-2 py-4">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
{{--                    {!! $product->links() !!}--}}
            </div>
        </div>
    </section>
@endsection