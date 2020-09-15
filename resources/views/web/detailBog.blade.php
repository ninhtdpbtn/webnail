@extends('web.layout.index')
@section('content')

    <section class="ftco-section" >
        <div class="container" style="margin-top: -50px">
            <div class="row">
                @foreach($data as $list)
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{$list->title}}</h2>
                    <p>{{$list->short_title}}</p>
                    <p><img src="/webnail/public/{{$list->image}}" style="width: 800px"></p>
                    <p>{!!$list->details!!}</p>
                    <div class="comment-form-wrap pt-5">
                        <p style="color: black ;font-weight: bold;	">Bình luận đánh giá</p>
                        <div class="fb-comments" data-href="http://localhost/webnail/public/detailBog/3" data-numposts="5" data-width="600"></div>
                    </div>
                </div> <!-- .col-md-8 -->
                @endforeach
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-2">Bài viết liên quan</h3>
                        @foreach($blog as $list)
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" href="{{asset('bai-viet/'.$list->slug)}}" style="background-image: url(/webnail/public/{{$list->image}});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="{{asset('bai-viet/'.$list->slug)}}">{{$list->title}}</a></h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- .section -->
    @endsection