@extends('layouts.appp')

@section('style')
    
@endsection
@section('content')

<main class="main">
  <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
      <h1 class="page-title">Change Password<span></span></h1>
    </div><!-- End .container -->
  </div><!-- End .page-header -->
   
    <div class="page-content">
      <div class="dashboard">
          <div class="container">
            <div class="row">
              @include('user.sidebar')
            

              <div class="col-md-8 col-lg-9">
                <div class="tab-content">
           
                  <form action="{{ route('user.updatepw') }}" method="POST">
                    @csrf
                  
                            <label>Old Password *</label>
                            <input type="password" class="form-control" required name="old_password" >
                          </div>
                          <div class="row">
                          <div class="col-sm-6">
                            <label>New Password *</label>
                            <input type="password" class="form-control" required name="password">
                          </div>
                      
                          <div class="col-sm-6">
                            <label>Confirm Password *</label>
                            <input type="password" class="form-control" required name="cpassword" >
                          </div>
                        
                        </div>
                       
                        <button type="submit" style="width:100px;" class="btn btn-outline-primary-2 btn-order btn-block">
                          <span class="btn-text">Edit profile</span>
                          <span class="btn-hover-text">Submit</span>
                        </button>
                      
                  </form>
           
        
              </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
          </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
@section('script')
    
@endsection