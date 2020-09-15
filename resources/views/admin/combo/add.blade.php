@extends('admin.layout.index')
@section('content')
    <div class="container-fluid" style="width: 700px; float: left;">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thêm Combo</h1>
        <form method="post" action="{{route('saveCombo')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1"  placeholder="Nhập name" value="{{ old('name') }}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">detail</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="detail"  placeholder="Nhập detail" value="{{ old('detail') }}">
                @error('detail')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">price</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="price"  placeholder="Nhập price" value="{{ old('price') }}">
                @error('price')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>

    </div>
@endsection