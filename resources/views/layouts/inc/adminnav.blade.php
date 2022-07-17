<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent cus-adbar">
    <div class="container-fluid">
        <div class="navbar-wrapper cus-wrap">
            <a class="navbar-brand cus-brand" style="font-size:20px">Trang quản lý</a>
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
            <li class="nav-item btn-rotate dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="nc-icon nc-circle-10"></i>
                <p>
                <span class="d-lg-none d-md-block">Account</span>
                </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                
                <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Đăng xuất') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            </li>
        </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->