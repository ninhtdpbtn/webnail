@extends('admin.layout.index')
@section('content')
    @if (session('mess'))
        <div class="btn btn-success">Xin chào {{Auth::user()->name}}</div>
    @endif
@endsection