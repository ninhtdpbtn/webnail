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
    <section class="ftco-section bg-light" >
        <div class="container" style="margin-top: -60px">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 style="font-size: 40px" class="mb-1">Danh sách bài viết</h2>
                </div>
            </div>
            <div class="row d-flex">
                @foreach($blog as $list)
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="{{asset('bai-viet/'.$list->slug)}}" class="block-20" style="background-image: url('/webnail/public/{{$list->image}}');height: 400px;width: 400px">
                        </a>
                        <div class="text p-4 float-right d-block">
                            <h3 class="heading mt-2"><a href="{{asset('bai-viet/'.$list->slug)}}">{{$list->title}}</a></h3>
                            <p>{{$list->short_title}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mt-5">
                {!! $blog->links() !!}
            </div>
        </div>
    </section>
@endsection