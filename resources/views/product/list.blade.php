@extends('layouts.appp')

<style type="text/css">
.active-color {
  border: 3px solid #000 !important;
}
</style>

@section('content')
<main class="main">
  <div class="page-header text-center" style="background-image: url('{{ asset('assets/images/page-header-bg.jpg') }}')">
    <div class="container">
      @if (!empty($getSubCategory))
        <h1 class="page-title">{{ $getSubCategory->name }}</h1>
      @elseif(!empty($getCategory))
        <h1 class="page-title">{{ $getCategory->name }}</h1>
      @else
        <h1 class="page-title">Search for {{ request()->get('q') }}</h1>
      @endif
    </div>
  </div>

  <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
        @if (!empty($getSubCategory))
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ url($getCategory->slug) }}">{{ $getCategory->name }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $getSubCategory->name }}</li>
        @elseif(!empty($getCategory))
          <li class="breadcrumb-item active" aria-current="page">{{ $getCategory->name }}</li>
        @endif
      </ol>
    </div>
  </nav>

  <div class="page-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="toolbox">
            <div class="toolbox-left">
              <div class="toolbox-info">
                Showing <span>{{ $getProduct->perPage() }} of {{ $getProduct->total() }}</span> Products
              </div>
            </div>
          </div>

          <div id="getProductAjax">
            @include('product._list', ['products' => $getProduct])
          </div>
        </div>

        <aside class="col-lg-3 order-lg-first">
          <form action="" id="FilterForm" method="post">
            @csrf
            <input type="hidden" name="q" value="{{ request()->get('q') }}">
            <input type="hidden" name="sub_category_id" id="get_sub_category_id" onChange="FilterForm()">
            <input type="hidden" name="color_id" id="get_color_id" onChange="FilterForm()">
          </form>

          <div class="sidebar sidebar-shop">
            <div class="widget widget-clean">
              <label>Filters:</label>
              <a href="#" class="sidebar-filter-clear">Clean All</a>
            </div>

            @if(!empty($getSubCategoryFilter))
              <div class="widget widget-collapsible">
                <h3 class="widget-title">
                  <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                    Category
                  </a>
                </h3>
                <div class="collapse show" id="widget-1">
                  <div class="widget-body">
                    <div class="filter-items filter-items-count">
                      @foreach ($getSubCategoryFilter as $f_category)
                        <div class="filter-item">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="{{ $f_category->id }}" class="custom-control-input ChangeCategory" id="cat-{{ $f_category->id }}">
                            <label class="custom-control-label" for="cat-{{ $f_category->id }}">{{ $f_category->name }}</label>
                          </div>
                          <span class="item-count">{{ $f_category->TotalProduct() }}</span>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            @endif

            <div class="widget widget-collapsible">
              <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                  Colour
                </a>
              </h3>
              <div class="collapse show" id="widget-3">
                <div class="widget-body">
                  <div class="filter-colors">
                    @foreach ($getColor as $f_color)
                      <a href="javascript:;" id="{{ $f_color->id }}" class="ChangeColor" data-val="0" style="background: {{ $f_color->code }};">
                        <span class="sr-only">{{ $f_color->name }}</span>
                      </a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>

            <div class="widget widget-collapsible">
              <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                  Brand
                </a>
              </h3>
              <div class="collapse show" id="widget-4">
                <div class="widget-body">
                  <div class="filter-items">
                    @foreach ($getBrand as $f_brand)
                      <div class="filter-item">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="brand-{{ $f_brand->id }}">
                          <label class="custom-control-label" for="brand-{{ $f_brand->id }}">{{ $f_brand->name }}</label>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
</main>

<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/js/wNumb.js') }}"></script>
<script src="{{ url('assets/js/bootstrap-input-spinner.js') }}"></script>
<script src="{{ url('assets/js/nouislider.min.js') }}"></script>

<script type="text/javascript">
  $('.ChangeCategory').change(function() {
    var ids = '';
    $('.ChangeCategory').each(function() {
      if (this.checked) {
        var id = $(this).val();
        ids += id + ',';
      }
    });
    $('#get_sub_category_id').val(ids);
    FilterForm();
  });

  $('.ChangeColor').click(function() {
    var id = $(this).attr('id'); 
    var status = $(this).attr('data-val');
    if (status == 0) {
      $(this).attr('data-val', 1);
      $(this).addClass('active-color');
    } else {
      $(this).attr('data-val', 0);
      $(this).removeClass('active-color');
    }

    var ids = '';
    $('.ChangeColor').each(function() {
      var status = $(this).attr('data-val');
      if (status == 1) {
        var id = $(this).attr('id'); 
        ids += id + ',';
      }
    });
    $('#get_color_id').val(ids);
    FilterForm();
  });

  var xhr;
  function FilterForm() {
    if (xhr && xhr.readyState != 4) {
      xhr.abort();
    }
    xhr = $.ajax({
      type: "POST",
      url: "{{ url('get_filter_product_ajax') }}",
      data: $('#FilterForm').serialize(),
      dataType: "json",
      success: function(data) {
        $('#getProductAjax').html(data.success)
      },
      error: function(data) {
        console.error("An error occurred.", data);
      }
    });
  }
</script>
@endsection
