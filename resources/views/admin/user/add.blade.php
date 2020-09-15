@extends('admin.layout.index')
@section('content')
    <div class="container-fluid" style="width: 700px; float: left;">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('listUser')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
        <h1 class="h3 mb-2 text-gray-800">Thêm USER</h1>
        <form method="POST" action="{{route('saveUser')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name"  placeholder="Nhập name" value="{{ old('name') }}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Gmail</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="email"  placeholder="Nhập email" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" class="form-control" id="exampleInputEmail1" name="image" placeholder="Nhập image" value="{{ old('image') }}">

                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="phone"  placeholder="Nhập phone" value="{{ old('phone') }}">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Adderss</label>
                <input type="text" class="form-control" name="address" id="exampleInputEmail1" placeholder="Nhập adderss" value="{{ old('address') }}">
                @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Nhập password" value="{{ old('password') }}">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nhập lại Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" placeholder="Nhập password" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Status s</label>
                <select class="form-control" id="exampleFormControlSelect1" name="status">
                    <option value="1">Người dùng</option>
                    <option value="2">Quản trị viên</option>
                </select>
                @error('status')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection