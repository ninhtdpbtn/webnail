@extends('web.layout.index')
@section('content')
<section class="ftco-section contact-section" style="margin-top: -60px">
    <div class="container">
        <div class="row block-9">
            <div class="col-md-4 contact-info ftco-animate bg-light p-4">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h2 class="h4">Thông tin liên lạc</h2>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Cơ sở 1 :</span> Xóm hanh - Điềm Thụy - Phú Bình - Thái Nguyên</p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Cơ sở 2 :</span>Chợ SAMSUNG - Phổ Yên - Thái Nguyên</p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Sđt:</span> <a href="tel://1234567920">	0999999999</a></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">queenbeauty@gmai.com</a></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Website:</span> <a href="#">queenbeauty.vn</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 ftco-animate">
                <form action="{{route('postcontact')}}" method="POST" class="contact-form">
                    @csrf
                    @if (session('thongbao'))
                        <div style="background-color: green;" class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="3000">
                            <div style="color: white" role="alert" aria-live="assertive" aria-atomic="true">{{session('thongbao')}}</div>
                        </div>
                    @endif
                    <h3>Liên hệ</h3>
                    <p style="color: #555555; font-size: 15px;font-style: italic">Xin hãy điền thông tin và lời nhắn của bạn vào biểu mẫu dưới đây<br>
                     Quyên Beauty sẽ liên hệ lại với bạn trong thời gian nhanh nhất.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" value="{{ old('phone') }}" class="form-control" name="phone" placeholder="Số Điện Thoại">
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" value="{{ old('email') }}" class="form-control" name="email" placeholder="Email ( không bắt buộc ) ">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ old('name') }}" class="form-control" name="name" placeholder="Họ và Tên">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea  id="" cols="30"  rows="5" name="detail" class="form-control" placeholder="Nội dung">{{ old('detail') }}</textarea>
                        @error('detail')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Nhận tư vấn" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
            <div class="col-md-4 ftco-animate">
                <h3>Bản đồ</h3>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1278.334026437377!2d105.91414108615365!3d21.481234243593445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313523cb3e3d23e3%3A0x64ff7c165fcb2419!2sQueen%20beauty%20spa!5e0!3m2!1sen!2s!4v1595007344785!5m2!1sen!2s" width="1200" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color: rgba(180, 192, 21, 0.71);;text-align:left;font-size:12px">View Larger Map</a></small>
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
