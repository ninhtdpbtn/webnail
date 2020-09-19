@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tra cứu theo thời gian</h1>
        <!-- DataTales Example -->
        <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tra cứu theo (D-M-Y)</h6>
            </div>
            @if (session('baoloi'))
                <p class="text-danger">{{session('baoloi')}}</p>
            @endif
            <div class="card-body">
                <form method="POST" action="{{route('tra_cuu_don_hang')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="lastName" class="">Thời gian 1</label>
                        <div class="col-10">
                            <input value="{{ old('time_1') }}" class="form-control" name="time_1" type="date"  id="example-date-input">
                            @error('time_1')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastName" class="">Thời gian 2</label>
                        <div class="col-10">
                            <input value="{{ old('time_2') }}" class="form-control" name="time_2" type="date"  id="example-date-input">
                            @error('time_2')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right">Tra cứu</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection