<!-- File: resources/views/user/editprofile.blade.php -->
@extends('layouts.appp')

@section('style')
@endsection

@section('content')
<main class="main">
  <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
      <h1 class="page-title">Edit Profile<span></span></h1>
    </div><!-- End .container -->
  </div><!-- End .page-header -->
   
  <div class="page-content">
    <div class="dashboard">
      <div class="container">
        <div class="row">
          @include('user.sidebar')
          <div class="col-md-8 col-lg-9">
            <div class="tab-content">
              <form action="{{ route('user.updateprofile') }}" method="POST">
                @csrf
               
                    <div class="row">
                      <div class="col-sm-6">
                        <label>First Name *</label>
                        <input type="text" class="form-control" required name="name" value="{{ $getRecord->name }}">
                      </div>
                      <div class="col-sm-6">
                        <label>Last Name *</label>
                        <input type="text" class="form-control" required name="lastname" value="{{ $getRecord->lastname }}">
                      </div>
                    </div>
                    <label>Email address *</label>
                    <input type="email" class="form-control" required name="email" value="{{ $getRecord->email }}">
                    <label>Street address *</label>
                    <input type="text" class="form-control" placeholder="House number and Street name" required name="streetaddress" value="{{ $getRecord->streetaddress }}">
                    <div class="row">
                      <div class="col-sm-6">
                        <label>City *</label>
                        <input type="text" class="form-control" required name="town" value="{{ $getRecord->city }}">
                      </div>
                      <div class="col-sm-6">
                        <label>State *</label>
                        <input type="text" class="form-control" required name="state" value="{{ $getRecord->state }}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <label>Postcode *</label>
                        <input type="text" class="form-control" required name="postcode" value="{{ $getRecord->postcode }}">
                      </div>
                      <div class="col-sm-6">
                        <label>Phone *</label>
                        <input type="tel" class="form-control" required name="phone" value="{{ $getRecord->phone }}">
                      </div>
                    </div>
                    <button type="submit" style="width:100px;" class="btn btn-outline-primary-2 btn-order btn-block">
                      <span class="btn-text">Edit profile</span>
                      <span class="btn-hover-text">Submit</span>
                    </button>
                 
              </form>
            </div><!-- End .tab-content -->
          </div><!-- End .col-lg-9 -->
        </div><!-- End .row -->
      </div><!-- End .container -->
    </div><!-- End .dashboard -->
  </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection

@section('script')
@endsection
