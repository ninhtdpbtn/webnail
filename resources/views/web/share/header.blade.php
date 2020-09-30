
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}"><span class="flaticon-lotus"></span>QUEEN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{route('home')}}" class="nav-link">TRANG CHỦ</a></li>
                <li class="nav-item"><a href="{{route('products')}}" class="nav-link">Sản phẩm</a></li>
                <li class="nav-item"><a href="{{route('bog')}}" class="nav-link">Tin tức</a></li>
                <li class="nav-item"><a href="{{route('staff')}}" class="nav-link">Chuyên gia</a></li>
                <li class="nav-item"><a href="{{route('combo')}}" class="nav-link">Combo</a></li>
                @auth
                    <li class="nav-item"><a href="{{route('giohang_user')}}" class="nav-link">Giỏ hàng</a></li>
                @else
                <li class="nav-item"><a href="{{route('Home.giohang')}}" class="nav-link">Giỏ hàng</a></li>
                @endauth
                <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Liên hệ</a></li>
                @auth
                <li class="dropdown" style="padding-top: 17px"><a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">{{Auth::user()->name}}&nbsp;<i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu dropdown-menu-2">
                            <li><a href="{{route('dat_lich_user')}}">Đơn đặt lịch</a></li>
                            <li><a href="{{route('logout')}}"  onclick="return confirm('bạn chắc chắn muốn đăng xuất')">Đăng xuất</a></li>
                    </ul>
                </li>
                <li><img style="height: 2rem ;width: 2rem;border-radius: 50%!important; margin-top: 15px; margin-left: 5px;"  src="{{Auth::user()->image}}"></li>
                @else
                <li class="nav-item active" style="padding-top: 17px">
                    <li class="nav-item active"><a href="{{route('login')}}" class="nav-link">ĐĂNG NHẬP</a></li>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

