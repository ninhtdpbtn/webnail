@extends('admin.layout.index')
@section('content')
    <div class="container-fluid" style="width: 700px; float: left;">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('list_category_news')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h1 class="h3 mb-2 text-gray-800">Sửa Danh Mục Bài Viết</h1>
        <form method="POST" action="{{route('edit_category_news',['id'=>$list_edit->id])}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name"  placeholder="Nhập tên danh mục" value="{{$list_edit->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
@endsection