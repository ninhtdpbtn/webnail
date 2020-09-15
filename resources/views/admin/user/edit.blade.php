@extends('admin.layout.index')
@section('content')
    <div class="container-fluid" style="width: 700px; float: left;">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('listUser')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h1 class="h3 mb-2 text-gray-800">Sửa USER</h1>
        <form method="POST" action="{{route('updateUser' ,['id' => $pro->id])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" value="{{$pro ->name}}" id="exampleInputEmail1"  placeholder="Nhập name">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" value="{{$pro ->email}}" id="exampleInputEmail1"  placeholder="Nhập email">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" class="form-control" name="image" value="{{$pro ->image}}" id="exampleInputEmail1"  placeholder="Nhập image">
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="number" class="form-control"  name="phone" value="{{$pro ->phone}}" id="exampleInputEmail1"  placeholder="Nhập phone">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Adderss</label>
                <input type="text" class="form-control" name="address" value="{{$pro ->address}}" id="exampleInputEmail1" placeholder="Nhập adderss">
                @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" value="{{$pro ->password}}"  id="exampleInputPassword1" placeholder="Nhập password">
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
                <select class="form-control"  value="{{$pro ->status}}" id="exampleFormControlSelect1" name="status">
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