<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admins/home')}}" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      {{-- <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library --> 
               
               @can('order_list')
               <li class="nav-item">
                <a href="{{ route('admins.orders.index') }}" class="nav-link">
                  <i class="fa-solid fa-cart-flatbed"></i>
                  <p>
                    Quản lý đơn hàng
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
              @endcan
          @can('category_list')
          <li class="nav-item">
            <a href="{{ route('admins.categories.index') }}" class="nav-link">
              <i class="fa-solid fa-list-ol"></i>
              <p>
                Danh mục sản phẩm 
                
              </p>
            </a>
          </li>
          @endcan
          {{-- //Menu --}}
          @can('menu_list')
          <li class="nav-item">
            <a href="{{ route('admins.menus.index') }}" class="nav-link">
              <i class="fa-solid fa-list"></i>
              <p>
                Danh sách menu 
              </p>
            </a>
          </li>
          @endcan
          

          {{-- Product --}}
          @can('product_list')
          <li class="nav-item">
            <a href="{{ route('admins.products.index') }}" class="nav-link">
              <i class="fa-brands fa-product-hunt"></i>
              <p>
                Danh sách sản phẩm  
              </p>
            </a>
          </li>
          @endcan
          
          {{-- Slides --}}
          @can('slider_list')
          <li class="nav-item">
            <a href="{{route('admins.slides.index')}}" class="nav-link">
              <i class="fa-solid fa-sliders"></i>
              <p>
                Slides
              </p>
            </a>
          </li>
          @endcan
         
          {{-- User --}}
          @can('user_list')
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
              <i class="fa-solid fa-user"></i>
              <p>
                Danh sách người dùng
              </p>
            </a>
          </li>
          @endcan
          
          {{-- Role --}}
          @can('role_list')
          <li class="nav-item">
            <a href="{{route('roles.index')}}" class="nav-link">
              <i class="fa-solid fa-users"></i>
              <p>
                Danh sách phân quyền (Role)
              </p>
            </a>
          </li>
          @endcan
          
          {{-- Permission --}}
          @can('permission_add')
          <li class="nav-item">
            <a href="{{route('permissions.create')}}" class="nav-link">
              
              <p>
                Tạo danh sách phân quyền
              </p>
            </a>
          </li>
          @endcan
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>