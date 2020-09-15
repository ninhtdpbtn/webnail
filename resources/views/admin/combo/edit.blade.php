@extends('admin.layout.index')
@section('content')
    <div class="container-fluid" style="width: 700px; float: left;">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sửa Combo</h1>
        <form method="post" action="{{route('updateCombo',['id' => $pro->id])}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{$pro->name}}"  placeholder="Nhập name">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">detail</label>
                <input type="text" class="form-control" name="detail" id="exampleInputEmail1"  value="{{$pro->detail}}" placeholder="Nhập image">
                @error('detail')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">price</label>
                <input type="number" class="form-control" name="price" id="exampleInputEmail1" value="{{$pro->price}}" placeholder="Nhập image">
                @error('price')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>

    </div>
@endsection