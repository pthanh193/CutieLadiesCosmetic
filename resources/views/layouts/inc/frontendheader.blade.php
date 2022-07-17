<!-- Nav Bar Start -->
<div class="nav" >
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md  navbar-dark" style="background-color:#FF6F61">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{url('/')}}" class="nav-item nav-link active">Cutie Ladies</a>
                    <a  href="{{url('brand-list')}}" class="nav-item nav-link">Thương hiệu</a>
                    <a  href="{{url('product-list')}}" class="nav-item nav-link">Sản phẩm</a>
                     
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục sản phẩm</a>
                        <div class="dropdown-menu">
                            @foreach ($category as $cate)
                            <a href="{{url('category/'.$cate->slug)}}" class="dropdown-item">{{$cate->name}}</a>
                            @endforeach  
                        </div>
                    </div>
                   
                </div>

                <div class="navbar-nav mr-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký tài khoản') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown ">
                            <a style="padding-right:70px" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}

                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                               
                                <a class="dropdown-item" href="{{url('my-orders')}}">
                                    Đơn mua
                                </a>
                              
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Đăng xuất') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            
                            </ul>
                        </li>
                        @endguest

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->      

<!-- Bottom Bar Start -->
<div class="bottom-bar cus-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{ asset('frontend/img/logo.png') }}" alt="Logo" class="logo" />
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="search">
                    <form action="{{url('search')}}">
                        <div class="form-group">
                            <input class=" cus-input-search" type="text" name="search" placeholder="Tìm kiếm...">
                        </div>
                        <button type="submit" class="cus-btn-search fa fa-search"></button>   
                    </form>
                </div>
            </div>
            @if(Auth::check())
            <div class="col-md ">
                <div class="user">
                    <a href="{{url('cart')}}" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span class= "badge badge-warning count-items" id='lblCartCount'>0</span> 
                        <!-- <li><a class="text-center" href="{{url('cart')}}">Xem giỏ hàng</a></li> -->
                    </a>
                </div>
            </div>
            @else 
            <div class="col-md ">
                <div class="user ">
                    <a href="{{url('login')}}" class="btn cart ">
                        <div class="navbar-nav mr-auto">
                            <i class="fa fa-shopping-cart "></i> 
                        </div>
                    </a>
                    <!-- <div class="nav-item dropdown">
                        <a href="{{url('login')}}" class="nav-link dropdown-toggle btn cart" data-toggle="dropdown"> <i class="fa fa-shopping-cart cus-cart"></i>Danh mục sản phẩm</a>
                        <div class="dropdown-menu">

                        </div>
                    </div> -->
                    
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {

        loadCart();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        function loadCart(){
            $.ajax({
                method: "GET",
                url: "/count-cart",
                success:function(response){
                    // $('.count-items').html('');
                    $('.count-items').html(response.count);
                }
            });
        }       
    });

    
</script>
<!-- Bottom Bar End -->  

