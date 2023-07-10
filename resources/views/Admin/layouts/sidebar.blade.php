<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/home">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Cửa hàng sách Online</div>
    </a>

    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chủ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Quản lý danh mục</div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="fas fa-fw fa-bookmark"></i>
            <span>Quản lý loại sách</span></a>
    </li>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('book.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Quản lý sách</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Quản lý đơn hàng</div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Thanh toán</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Xác nhận chuyển tiền</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <br>
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
