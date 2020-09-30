<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Queen</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Phân tích</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tracuu" aria-expanded="true" aria-controls="tracuu">
            <i class="fa fa-search"></i>
            <span>Tra cứu</span>
        </a>
        <div id="tracuu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('search_date')}}">Tra cứu đơn hàng</a>
                <a class="collapse-item" href="{{route('tra_cuu_doanh_thu')}}">Tra cứu doanh thu</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#listBooking" aria-expanded="true" aria-controls="listBooking">
            <i class="fas fa-fw fa-folder"></i>
            <span>Danh sách đặt lịch</span>
        </a>
        <div id="listBooking" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('listBooking')}}">Đơn đặt lịch</a>
                <a class="collapse-item" href="{{route('booking_finish')}}">Đơn đã hoàn thành</a>
            </div>
        </div>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{route('listUser')}}">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Danh sách tài khoản</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Danh mục</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('listCategory')}}">Danh mục sản phẩm</a>
                <a class="collapse-item" href="{{route('list_category_news')}}">Danh mục bài viết</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sản phẩm và bài viết</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('listProduct')}}">Danh sách sản phẩm</a>
                <a class="collapse-item" href="{{route('listNews')}}">Danh sách bài viết</a>
                <a class="collapse-item" href="{{route('cho_dang_bai')}}">Bài viết chờ đăng</a>
            </div>
        </div>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{route('listExpert')}}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Chuyên gia</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#lienhe" aria-expanded="true" aria-controls="lienhe">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
            <span>Liên hệ</span>
        </a>
        <div id="lienhe" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('list_contact')}}">Thư</a>
                <a class="collapse-item" href="{{route('watched_contact')}}">Thư đã đọc</a>
            </div>
        </div>
    </li>
</ul>