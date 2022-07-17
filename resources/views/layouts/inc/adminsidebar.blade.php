<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
            <a href="{{url('/')}}" target="_blank">
            <img src="{{ asset('admin/image/admin-logo.png') }}"  alt="Logo"/></a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <!-- <li class="nav-item {{Request::is('dashboard') ? 'active':''; }}">
            <a href="dashboard">
              <i class="nc-icon nc-shop"></i>
              <p>Trang chủ</p>
            </a>
          </li> -->
          <li class="nav-item {{Request::is('brands') ? 'active':''; }}">
            <a href="{{ url('brands')}}">
              <i class="nc-icon nc-tag-content"></i>
              <p>Thương hiệu</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('categories') ? 'active':''; }}">
            <a href="{{ url('categories')}}">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Loại sản phẩm</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('products') ? 'active':''; }}">
            <a href="{{ url('products')}}">
              <i class="nc-icon nc-app"></i>
              <p>Sản phẩm</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('members') ? 'active':''; }}">
            <a href="{{ url('members')}}">
              <i class="nc-icon nc-single-02"></i>
              <p>Thành viên</p>
            </a>
          </li>
         
          <li class="nav-item {{Request::is('orders') ? 'active':''; }}">
            <!-- <a href="{{ url('orders')}}">
              <i class="nc-icon nc-box-2"></i>
              <p>Đơn hàng</p>
            </a> -->
            
            <a href="#" data-toggle="dropdown" ><i class="nc-icon nc-box-2"></i>Đơn hàng</a>
            <ul class="dropdown-menu " style="text-align:center;position:relative;z-index: 10;">
              <li><a href="{{ url('orders')}}">  Đơn hàng mới</a></li>
              <li><a href="{{ url('orders-history')}}">Đơn hàng cũ</a></li>
              <li><a href="{{ url('canceled-orders')}}">Đơn hàng hủy</a></li>
            </ul>
          </li>  
         
          <li class="nav-item {{Request::is('review') ? 'active':''; }}">
            <a href="{{ url('review')}}">
              <i class="nc-icon nc-chat-33"></i>
              <p>Đánh giá</p>
            </a>
          </li>
        </ul>
      </div>
    </div>