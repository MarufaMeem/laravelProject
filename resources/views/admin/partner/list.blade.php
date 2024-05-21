@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">


        <div class="col-sm-6">
          <h1>Partner List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right;">
          
       
            <a href="{{url('admin/partner/add')}}" class="btn btn-primary">Add New Partner</a>
        
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
  @include('sweetalert::alert')

          <!-- /.card -->

          <div class="card">
            
            <div class="card-body p-0">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>Button Link</th>
                    
                    
                    <th>Photo</th>
                    <th>Status</th>
                    
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value)
              
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->button_link}}</td>
                   
                    <td>
                      <img src="{{ asset('uploads/partner/'.$value->image) }}" style="width: 100px; height: 100px;">
                  </td>
                  
                    <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>

                   

                   <td> <a href="edit/{{$value->id}}" class="btn btn-primary">Edit</a>
                    <a href="delete/{{$value->id}}" class="btn btn-danger">Delete</a></td>
                  </tr>
                 @endforeach
                </tbody>
              </table>

              <div style="padding: 10px; float: right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>

  @endsection

  @section('script')
  

  
  @endsection