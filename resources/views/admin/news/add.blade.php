@extends('admin.layout.index')
@section('content')
    <div class="container-fluid" style="width: 700px; float: left;">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('listNews')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
        <h1 class="h3 mb-2 text-gray-800">Thêm News</h1>
        <form  method="POST" action="{{route('saveNews')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control"  name="title"  placeholder="Nhập Title" value="{{ old('title') }}">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Short_title</label>
                <input type="text" class="form-control"  name="short_title"  placeholder="Nhập short_title" value="{{ old('short_title') }}">
                @error('short_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Danh mục</label>
                <select name="id_category_news" class="form-control" id="exampleFormControlSelect1">
                    @foreach($data as $pro)
                        <option value="{{$pro->id}}">{{$pro->id}}--{{$pro->name}}</option>
                    @endforeach
                </select>
                @error('id_category_news')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Details</label>
                <textarea type="text" class="form-control" id="ckeditor_details" name="details" rows="10"  placeholder="Nhập Detail">{{ old('detail') }}</textarea>
                @error('details')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" class="form-control" id="exampleInputEmail1"  name="image" placeholder="Nhập Image" value="{{ old('image') }}">
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Trạng thái</label>
                <select name="status" class="form-control" id="exampleFormControlSelect1"  value="{{ old('status') }}">
                        {{--<option>--chọn trạng thái --</option>--}}
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