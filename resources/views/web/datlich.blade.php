@extends('web.layout.index')
@section('content')
    <section class="ftco-section" style="margin-top: -200px">
        <div class="container">
            <div class="pt-5 mt-5">
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Điền thông tin đặt lịch</h3>
                            @auth
                            <form action="{{route('Home.savebooking')}}" class="bg-light p-4" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                             <fieldset class="border p-2" style="float: left;width: 600px;height:628px;">
                                    <legend  class="w-auto">Thông tin khách hàng</legend>
                                    <div class="form-group">

                                        <label for="name">Tên khách hàng </label>
                                        <input type="text" class="form-control bg-white" name="name_booking" id="name" style="width: 500px">
                                            @error('name_booking')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        <label for="website">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone_booking" id="website" style="width: 500px">
                                        @error('phone_booking')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                        <label for="website">Email</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="email_booking" id="website" style="width: 500px">
                                            @error('email_booking')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <label for="website">Thời gian đến làm</label>
                                        <div class="form-group">
                                            <input type="datetime-local" name ="time_booking">
                                            @error('time_booking')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="border p-2">
                                    <legend  class="w-auto">Chọn dịch vụ</legend>
                                    <div class="form-group">
                                        
                                        <label for="name" >Mẫu riêng :</label>
                                        <input type="file" class="form-control bg-white" name="image_booking" id="name" style="width: 500px">
                                        @error('image_booking')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </fieldset>

                                <fieldset class="border p-2" >
                                        <legend  class="w-auto">Chọn chuyên gia</legend>
                                        <select class="form-control" id="exampleFormControlSelect1" name="id_expert">
                                            @foreach($data as $pro)
                                            <option value="{{$pro->id}}">{{$pro->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_expert')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </fieldset>

                                <fieldset class="border p-2">
                                    <legend  class="w-auto">Yêu cầu đặc biệt</legend>
                                    <div class="form-group">
                                        <textarea name="description_booking" id="message" cols="30" rows="3" class="form-control"></textarea>
                                        @error('description_booking')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <legend  class="w-auto">Tên Mẫu</legend>
                                        <select class="form-control" id="exampleFormControlSelect1" name="ip_product[]" multiple>
                                            @foreach($join_us_sp as $pro)
                                                <option readonly="readonly" value="{{$pro->id_product}}" selected>{{$pro->name_product}}</option>
                                            @endforeach
                                        </select>
                                    <br>
                                </fieldset>
                                <br>
                                <div class="form-group">
                                    <input type="submit" value="Đặt lịch" class="btn py-3 px-4 btn-primary">
                                </div>
                            </form>



                                @else
                                <form action="{{route('oder_booking')}}" class="bg-light p-4" enctype="multipart/form-data" method="POST">
                                    {{ csrf_field() }}
                                    <fieldset class="border p-2" style="float: left;width: 600px;height:628px;">
                                        <legend  class="w-auto">Thông tin khách hàng</legend>
                                        <div class="form-group">
                                            <label for="name">Tên khách hàng </label>
                                            <input type="text" class="form-control bg-white" name="name_booking" id="name" style="width: 500px">
                                            @error('name_booking')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <label for="website">Số điện thoại</label>
                                            <input type="text" class="form-control" name="phone_booking" id="website" style="width: 500px">
                                            @error('phone_booking')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <label for="website">Email</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="email_booking" id="website" style="width: 500px">
                                                @error('email_booking')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <label for="website">Thời gian đến làm</label>
                                            <div class="form-group">
                                                <input type="datetime-local" name ="time_booking">
                                                @error('time_booking')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="border p-2">
                                        <legend  class="w-auto">Chọn dịch vụ</legend>
                                        <div class="form-group">

                                            <label for="name" >Mẫu riêng :</label>
                                            <input type="file" class="form-control bg-white" name="image_booking" id="name" style="width: 500px">
                                            @error('image_booking')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </fieldset>
                                    <fieldset class="border p-2" >
                                        <legend  class="w-auto">Chọn chuyên gia</legend>
                                        <select class="form-control" id="exampleFormControlSelect1" name="id_expert">
                                            @foreach($data as $pro)
                                                <option value="{{$pro->id}}">{{$pro->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_expert')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </fieldset>

                                    <fieldset class="border p-2">
                                        <legend  class="w-auto">Yêu cầu đặc biệt</legend>
                                        <div class="form-group">
                                            <textarea name="description_booking" id="message" cols="30" rows="3" class="form-control"></textarea>
                                            @error('description_booking')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <legend  class="w-auto">Tên Mẫu</legend>
                                            <select class="form-control" id="exampleFormControlSelect1" name="ip_product[]" multiple>
                                                @foreach($listSP as $pro)
                                                    <option readonly="readonly" value="{{$pro->id_product}}" selected>{{$pro->name_product}}</option>
                                                @endforeach
                                            </select>
                                        <br>
                                    </fieldset>
                                    <br>
                                    <div class="form-group">
                                        <input type="submit" value="Đặt lịch" class="btn py-3 px-4 btn-primary">
                                    </div>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
        </div>
    </section>

@endsection
