<aside class="col-md-4 col-lg-3">
  <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">

{{-- <li class="nav-item">
  <a class="nav-link" href="{{url('user/orders')}}" @if (Request::segment(2) == 'orders')
  active  
@endif>Orders</a>
</li> --}}

<li class="nav-item">
  <a class="nav-link" href="{{url('user/editprofile')}}" @if (Request::segment(2) == 'editprofile')
  active  
@endif>Edit Profile</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{url('user/changepw')}}" @if (Request::segment(2) == 'changepw')
  active  
@endif>Change Password</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{url('/login')}}" >Sign Out</a>
</li>
</ul>
</aside><!-- End .col-lg-3 -->