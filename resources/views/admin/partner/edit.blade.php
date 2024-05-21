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
          <h1>Edit Partner</h1>
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

<div class="row">
  <div class="col-md-6">
    
    </div>






 
<div class="form-group">
  <label >Image<span style="color:red">*</span></label>
  <input type="file" class="form-control" required  name="image"  >

</div>





<div class="form-group">
  <label >Button link<span style="color:red">*</span></label>
  <input type="text" class="form-control" value="{{old('button_link')}}" name="button_link"  placeholder="button_link">

</div>

<div class="form-group">
  <label >Status</label>
  <select class="form-control" name="status">
    <option {{(old('status')==0)? 'selected' : ''}}  value="0">Active</option>
    <option {{(old('status')==1)? 'selected' : ''}}  value="1">Inactive</option>
  </select>
     
</div>



</div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

          <!-- general form elements -->

          <!-- /.card -->

        </div>
  
    </div><!-- /.container-fluid -->
  </section>
</div>

  @endsection

  @section('script')
  <script src="{{url('/assetsh/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <script src="{{url('/sortable/jquery-ui.js')}}"></script>
  {{-- <script src="{{url('/tinymce/tinymce-jquery.min.js')}}"></script> --}}


<script type="text/javascript">
    $(document).ready(function(){
        $("#sortable").sortable({
            update : function(event, ui){
                var photo_id = new Array();
                $('.sortable_image').each(function(){
                    var id= $(this).attr('id');
                    photo_id.push(id);
                });
                $.ajax({
                    type:"POST",
                    url:"{{url('admin/product_image_sortable')}}",
                    data:{
                        "photo_id":photo_id,
                        "_token":"{{csrf_token()}}"
                    },
                    dataType:"json",
                    success:function(data){
                
                    },
                    error:function(data){}
                });
            }
        });

        $('#ChangeCategory').change(function(){
            var id = $(this).val();
            $.ajax({
                type:"POST",
                url:"{{url('/admin/get_sub_category')}}",
                data:{
                    "id": id,
                    "_token":"{{csrf_token()}}"
                },
                dataType:"json",
                success:function(data){
                    $('#getSubCategory').html(data.html);
                },
                error:function(data){
                    console.error(data);
                }
            });
        });
    });
</script>

  
  @endsection