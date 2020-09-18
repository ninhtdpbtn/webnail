
@extends('web.layout.index')
@section('content')
    <section class="ftco-section bg-light" >
        <div class="container wow fadeIn" style="margin-top: -150px">
            <h2 class="my-5 h2 text-center">Điền thông tin đặt lịch</h2>
            @auth
                <form action="{{route('Home.savebooking')}}"  enctype="multipart/form-data" method="POST" class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="md-form ">
                                        <label for="firstName" class="">Họ và tên</label>
                                        <input type="text" {{ old('name_booking') }} name="name_booking" id="firstName" class="form-control">
                                        @error('name_booking')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="md-form">
                                        <label for="lastName" class="">Số điện thoại</label>
                                        <input type="text" {{ old('phone_booking') }} name="phone_booking" id="lastName" class="form-control">
                                        @error('phone_booking')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="country">Email</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text" {{ old('email_booking') }} name="email_booking" class="form-control" id="inlineFormInputGroup" placeholder="Email (không bắt buộc)">
                                    </div>
                                    @error('email_booking')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2" >
                                    <label for="country">Chuyên gia</label>
                                    <select class="custom-select d-block w-100" name="id_expert" id="country" required>
                                        @foreach($data as $pro)
                                            <option value="{{$pro->id}}">{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_expert')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="md-form ">
                                        <label for="firstName" class="">Mẫu riêng</label>
                                        <input type="file" name="image_booking" id="firstName" class="form-control">
                                        @error('image_booking')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="md-form">
                                        <label for="lastName" class="">Thời gian đến làm</label>
                                        <input type="datetime-local" {{ old('time_booking') }} name="time_booking" id="lastName" class="form-control">
                                        @error('time_booking')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="md-form mb-5">
                                <label for="address-2" class="">Yêu cầu đặc biệt</label>
                                <textarea name="description_booking"  id="message" cols="30" rows="3" class="form-control">{{ old('description_booking') }}</textarea>
                                @error('description_booking')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4 mb-4" >
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Sản phẩm</span>
                                <span class="badge badge-secondary badge-pill">{{count($join_us_sp)}}</span>
                            </h4>
                            <div class="list-group mb-3 z-depth-1">
                                @foreach($join_us_sp as $pro)
                                    <div name="ip_product[]" class="list-group-item d-flex justify-content-between lh-condensed">
                                        <input style="margin-top: 10px" type="checkbox" name="id_product[]" value="{{$pro->id_product}}"
                                               id="defaultCheck1">
                                        <label   for="defaultCheck1">
                                            {{$pro->name_product}}
                                        </label>
                                        <span class="text-muted">{{number_format($pro->price, 0, '', '.')}} vnđ</span>
                                    </div>
                                @endforeach
                                <div class="list-group-item d-flex justify-content-between">
                                    <span>Tổng tiền (VNĐ)</span>
                                    <strong>{{number_format($total, 0, '', '.')}} vnđ</strong>
                                </div>
                                    @error('id_product')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <button class="btn btn-primary btn-lg " type="submit">Đặt lịch</button>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <form action="{{route('oder_booking')}}"  enctype="multipart/form-data" method="POST" class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="md-form ">
                                        <label for="firstName" class="">Họ và tên</label>
                                        <input type="text" name="name_booking"  value="{{ old('name_booking') }}"id="firstName" class="form-control">
                                        @error('name_booking')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="md-form">
                                        <label for="lastName" class="">Số điện thoại</label>
                                        <input type="text" name="phone_booking" value="{{ old('phone_booking') }}" id="lastName" class="form-control">
                                        @error('phone_booking')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="country">Email</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text" {{ old('email_booking') }} name="email_booking" class="form-control" id="inlineFormInputGroup" placeholder="Email (không bắt buộc)">
                                    </div>
                                    @error('email_booking')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2" >
                                    <label for="country">Chuyên gia</label>
                                    <select class="custom-select d-block w-100" name="id_expert" id="country" required>
                                        @foreach($data as $pro)
                                            <option value="{{$pro->id}}">{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_expert')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="md-form ">
                                        <label for="firstName" class="">Mẫu riêng</label>
                                        <input type="file" name="image_booking" id="firstName" class="form-control">
                                        @error('image_booking')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="md-form">
                                        <label for="lastName" class="">Thời gian đến làm</label>
                                        <input type="datetime-local" name="time_booking" id="lastName" class="form-control" value="{{ old('time_booking') }}">
                                        @error('time_booking')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="md-form mb-5">
                                <label for="address-2" class="">Yêu cầu đặc biệt</label>
                                <textarea name="description_booking"  id="message" cols="30" rows="3" class="form-control">{{ old('description_booking') }}</textarea>
                                @error('description_booking')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Sản phẩm</span>
                                <span class="badge badge-secondary badge-pill">{{count($listSP)}}</span>
                            </h4>
                            <div class="list-group mb-3 z-depth-1">
                                @foreach($listSP as $pro)
                                    <div name="ip_product[]" class="list-group-item d-flex justify-content-between lh-condensed">
                                        <input style="margin-top: 10px" type="checkbox" name="id_product[]" value="{{$pro->id_product}}"
                                               id="defaultCheck1">
                                        <label   for="defaultCheck1">
                                            {{$pro->name_product}}
                                        </label>
                                        <span class="text-muted">{{number_format($pro->price, 0, '', '.')}} vnđ</span>
                                    </div>
                                @endforeach
                                <div class="list-group-item d-flex justify-content-between">
                                    <span>Tổng tiền (VNĐ)</span>
                                    <strong>{{number_format($total, 0, '', '.')}} vnđ</strong>
                                </div>
                                    @error('id_product')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                <button class="btn btn-primary btn-lg " type="submit">Đặt lịch</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endauth
        </div>
    </section>
@endsection

