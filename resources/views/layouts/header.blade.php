

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
   
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{url('/')}}" class="nav-link">Home</a>
    </li>
    
  </ul>

  <!-- Right navbar links -->
 
</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('/')}}" class="brand-link" style="text-align: center;">
    <img src="/assetsh/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Harvest Of Heart</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
      
      <div class="info">
       
        <a href="{{('')}}" class="d-block"> {{ session('user_name') }}</a>
 
        
    
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            
             @if (in_array(session('user_role'), ['admin']))
           
             <li class="nav-item">
              <a href="{{url('/admin/list')}}"  class="nav-link  @if(Request::segment(2) == 'admin') @endif">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  Admins
         <br>
              
                </p>
              </a>
            </li>
         @endif


            <li class="nav-item">
              <a href="{{url('/admin/category/list')}}" class="nav-link @if(Request::segment(2) == 'category') active @endif">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
               Category 
                 
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('/admin/subcategory/list')}}" class="nav-link @if(Request::segment(2) == 'sub_category') active @endif">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
              Sub Category 
                 
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{url('/admin/brand/list')}}" class="nav-link @if(Request::segment(2) == 'brand') active @endif">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                  Brand 
                 
                </p>
              </a>
            </li>



            <li class="nav-item">
              <a href="{{url('/admin/color/list')}}" class="nav-link @if(Request::segment(2) == 'color') active @endif">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                  Color 
                 
                </p>
              </a>
            </li>



            <li class="nav-item">
              <a href="{{url('/admin/product/list')}}" class="nav-link @if(Request::segment(2) == 'Product') active @endif">
                <i class="nav-icon fas fa-product-hunt"></i>
                <p>
                 Product   
                 
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="{{url('/admin/slider/list')}}" class="nav-link @if(Request::segment(2) == 'slider') active @endif">
                <i class="nav-icon fas fa-product-hunt"></i>
                <p>
                 Slider 
                 
                </p>
              </a>
            </li>
       



            <li class="nav-item">
              <a href="{{url('/admin/page/list')}}" class="nav-link @if(Request::segment(2) == 'page') active @endif">
                <i class="nav-icon fas fa-product-hunt"></i>
                <p>
                 Pages 
                 
                </p>
              </a>
            </li>
       


            <li class="nav-item">
              <a href="{{url('/admin/partner/list')}}" class="nav-link @if(Request::segment(2) == 'partner') active @endif">
                <i class="nav-icon fas fa-product-hunt"></i>
                <p>
                 Partner 
                 
                </p>
              </a>
            </li>
       
   

        <li class="nav-item">
          <form method="POST" action="{{ url('/logout') }}">
            @csrf 
          <button type="submit" class="nav-link" style="background: none; border: none; padding-left: 2; margin: 0; text-align:left">
            <i class="fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </button>
        </form>
        </li>

   
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>