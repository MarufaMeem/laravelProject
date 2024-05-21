@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{url('/assetsh/plugins/summernote/summernote-bs4.min.css')}}">
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
                  <label >Name <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('name' , $getRecord->name)}}" name="name"  placeholder="Category Name">

                </div>

                <div class="form-group">
                  <label >Slug <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('slug', $getRecord->slug)}}" name="slug"  placeholder="Slug Ex.URL">
                  <div style="color:red">{{$errors->first('slug')}}</div>
                </div>
               

                <div class="form-group">
                  <label >Image<span style="color:red">*</span></label>
                  <input type="file" name="image[]" class="form-control" style="padding: 5px;" multiple accept="image/*">
                </div>


                <div class="form-group">
                  <label >Title <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('title', $getRecord->title)}}" name="title"  placeholder="title">
                  <div style="color:red">{{$errors->first('title')}}</div>
                </div>
               

                <div class="form-group">
                  <label >Description <span style="color:red">*</span></label>
                  <textarea class="form-control editor"   required  name="description"  placeholder="description"> </textarea>
                  <div style="color:red"></div>
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
  <script src="{{url('/assetsh/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <script src="{{url('/sortable/jquery-ui.js')}}"></script>
  {{-- <script src="{{url('/tinymce/tinymce-jquery.min.js')}}"></script> --}}



  
  @endsection