@extends('layouts.appp')

@section('style')
    
@endsection
@section('content')

<main class="main">
  <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
      <h1 class="page-title">Orders<span></span></h1>
    </div><!-- End .container -->
  </div><!-- End .page-header -->
   
    <div class="page-content">
      <div class="dashboard">
          <div class="container">
            <div class="row">
              @include('user.sidebar')
            

              <div class="col-md-8 col-lg-9">
                <div class="tab-content">
           
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th >#</th>
                        <th>Order Number</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Meta Description</th>
                        <th>Meta Keywords</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($getRecord as $value)
                  
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->slug}} </td>
                        <td>{{$value->meta_title}} </td>
                        <td>{{$value->meta_description}} </td>
                        <td>{{$value->meta_keywords}} </td>
                        <td>{{$value->created_by_name}} </td>
                        <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
                        <td>{{date('d-m-y',strtotime($value->created_at))}} </td>
    
                       <td> <a href="edit/{{$value->id}}" class="btn btn-primary">Edit</a>
                        <a href="delete/{{$value->id}}" class="btn btn-danger">Delete</a></td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
        
              </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
          </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
@section('script')
    
@endsection