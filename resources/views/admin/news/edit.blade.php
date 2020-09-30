@extends('admin.layout.index')
@section('content')
    <div class="container-fluid" style="width: 700px; float: left;">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sửa News</h1>
        <form  method="POST" action="{{route('updateNews',['id' => $pro->id])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{$pro->title}}"  placeholder="Nhập Title">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Short_title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="short_title" value="{{$pro->short_title}}"  placeholder="Nhập Title">
                @error('short_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Danh mục</label>
                <select name="id_category_news"  class="form-control" id="exampleFormControlSelect1">
                @foreach($data as $value)
                        <option value=" {{$pro->id_category_news}}">{{$pro->id_category_news}}--{{$name_category_news->name}}</option>
                        <option value="{{$value->id}}">{{$value->id}}--{{$value->name}}</option>
                    @endforeach
                </select>
                @error('id_category_news')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Details</label>
                <textarea type="text" class="form-control" id="ckeditor_details1" name="details" rows="10"  placeholder="Nhập Detail">{{$pro->details}}</textarea>
                @error('details')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" class="form-control" id="exampleInputEmail1" value="/webnail/public/{{$pro->image}}"  name="image"  placeholder="Nhập Image">
                <div class="mv-5">
                    <img src="{{$pro->image}}" style="height: 100px"; >
                </div>
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Trạng thái</label>
                <select name="status" class="form-control" id="exampleFormControlSelect1"  value="{{$pro->status}}">
                    <option value="{{$name_category_news->status}}">Trạng thái ban đầu ---> {{$name_category_news->status == 1 ? 'Đăng luôn' : 'Chờ đăng'}}</option>
                    <option value="1">Đăng luôn</option>
                    <option value="2">Chờ đăng</option>
                </select>
                @error('status')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>

    </div>
@endsection
