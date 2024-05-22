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
  <form method="POST" action="{{ url('/logout-user') }}">
    @csrf 
  <button type="submit" class="nav-link" style="background: none; border: none; padding-left: 2; margin: 0; text-align:left">
    <i class="fas fa-sign-out-alt"></i>
    <p>Sign Out</p>
  </button>
</form>
 
</li>
</ul>
</aside><!-- End .col-lg-3 -->