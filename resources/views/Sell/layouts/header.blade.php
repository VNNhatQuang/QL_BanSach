<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home.index') }}">Trang chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="">Giỏ hàng</a></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Thanh toán</a></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Lịch sử mua hàng</a></a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                {{-- <a class="nav-link" href="{{ route('auth.logout') }}">Đăng xuất</a> --}}
                <form action="{{ route('auth.logout') }}" method="post">
                    @csrf
                    <input type="submit" value="Đăng xuất" class="nav-link bg-dark border-0">
                </form>
            </li>
        </ul>
    </div>
</nav>