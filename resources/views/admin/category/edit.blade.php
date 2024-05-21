@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Edit Category</h1>
        </div>
       
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
           
            <form action="" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label >Category Name <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('name' , $getRecord->name)}}" name="name"  placeholder="Category Name">

                </div>

                <div class="form-group">
                  <label >Slug <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('slug', $getRecord->slug)}}" name="slug"  placeholder="Slug Ex.URL">
                  <div style="color:red">{{$errors->first('slug')}}</div>
                </div>
               
                <div class="form-group">
                  <label >Status <span style="color:red">*</span></label>
                  <select class="form-control" name="status">
                    <option {{(old('status',$getRecord->status)==0)? 'selected' : ''}}  value="0">Active</option>
                    <option {{(old('status',$getRecord->status)==1)? 'selected' : ''}}  value="1">Inactive</option>
                  </select>
                     
                </div>

                <div class="form-group">
                  <label >Image<span style="color:red">*</span></label>
                  <input type="file" name="image" class="form-control" style="padding: 5px;" multiple accept="image/*">
                  @if (!empty($getRecord->getLogo()))
                  <img src="{{$getRecord->getLogo()}}" style="height: 100px;width:100%">
                      
                  @endif
                </div>


                <div class="form-group">
                  <label >Button Name<span style="color:red">*</span></label>
                  <input type="text" class="form-control" value="{{old('button_name',$getRecord->button_name)}}" name="button_name"  placeholder="button name">
                
                </div>
                
              
                
                <div class="form-group">
                  <label >Home Screen<span style="color:red">*</span></label>
                  <input type="checkbox" {{!empty($getRecord->is_home) ? 'checked' : ''}} name="is_home"  >
                
                </div>


               
                <div class="form-group">
                  <label >Meta title <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('meta_title',$getRecord->meta_title)}}" name="meta_title"  placeholder="Meta title">
                </div>

                <div class="form-group">
                  <label >Meta description</label>
                  <input type="text" class="form-control" required value="{{old('meta_description',$getRecord->meta_description)}}" name="meta_description"  placeholder="Meta description">
                </div>

                <div class="form-group">
                  <label >Meta keywords</label>
                  <input type="text" class="form-control" required value="{{old('meta_keywords',$getRecord->meta_keywords)}}" name="meta_keywords"  placeholder="Meta keywords">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

          <!-- general form elements -->

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