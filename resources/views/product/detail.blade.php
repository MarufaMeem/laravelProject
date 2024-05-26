@extends('layouts.appp')



@section('content')
<link rel="stylesheet" href="{{url('/assets/css/plugins/nouislider/nouislider.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>

<main class="main">
  <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
      <div class="container d-flex align-items-center">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url($getProduct->getCategory->slug)}}">{{$getProduct->getCategory->name}}</a></li>

              <li class="breadcrumb-item"><a href="{{url($getProduct->getCategory->slug.'/'.$getProduct->getSubCategory->slug)}}">{{$getProduct->getSubCategory->name}}</a></li>


              <li class="breadcrumb-item active" aria-current="page">{{$getProduct->title}}</li>
          </ol>

         
      </div><!-- End .container -->
  </nav><!-- End .breadcrumb-nav -->

  <div class="page-content">
      <div class="container">
          <div class="product-details-top mb-2">
              <div class="row">
                  <div class="col-md-6">
                      <div class="product-gallery">
                          <figure class="product-main-image">

                            @php
                            $getProductImage = $getProduct->getImageSingle($getProduct->id);
                            @endphp
                             @if (!empty($getProductImage) && !empty($getProductImage->getLogo()))
                              <img id="product-zoom" src="{{ $getProductImage->getLogo() }}" data-zoom-image="{{ $getProductImage->getLogo() }}" alt="product image" class="elevatezoom">

                             
                                @endif
                          </figure><!-- End .product-main-image -->

                          <div id="product-zoom-gallery" class="product-image-gallery">
                            @foreach ($getProduct->getImage as $image)
                                
                        
                              <a class="product-gallery-item" href="#" data-image="{{$image->getLogo()}}" data-zoom-image="{{$image->getLogo()}}">
                                  <img src="{{$image->getLogo()}}" alt="product side" style="height: 100px;width:100%">
                              </a>
                              @endforeach
                              

                          </div><!-- End .product-image-gallery -->
                      </div><!-- End .product-gallery -->
                  </div><!-- End .col-md-6 -->

                  <div class="col-md-6">
                      <div class="product-details">
                          <h1 class="product-title">{{$getProduct->title}}</h1><!-- End .product-title -->

                          <div class="ratings-container">
                              
                              
                          </div><!-- End .rating-container -->

                          <div class="product-price">
                              ${{number_format($getProduct->price,2)}}
                          </div><!-- End .product-price -->

                          <div class="product-content">
                              <p>{{$getProduct->short_description}} </p>
                          </div><!-- End .product-content -->

                      <form action="{{url('product/add-to-cart')}}" method="post">
                        {{ csrf_field() }}
                      <input type="hidden" name="product_id" value="{{$getProduct->id}}">      
@if(!empty($getProduct->getColor->count()))

                          <div class="details-filter-row details-row-size">
                              <label for="size">Color:</label>
                              <div class="select-custom">
                                  <select name="color_id" id="color_id" class="form-control" required>
                                      <option value="#" selected="selected">Select a color</option>
                                     @foreach ($getProduct->getColor as $color)
                                     <option value="{{$color->getColor->id}}">{{$color->getColor->name}}</option>
                                     @endforeach
                                  </select>
                              </div><!-- End .select-custom -->
                          </div>
                          @endif
                            
                          </div><!-- End .details-filter-row -->

                          <div class="details-filter-row details-row-size">
                              <label for="qty">Qty:</label>
                              <div class="product-details-quantity">
                                  <input type="number" id="qty" class="form-control" value="1" min="1" max="100" name="qty" step="1" data-decimals="0" required>
                              </div><!-- End .product-details-quantity -->
                          </div><!-- End .details-filter-row -->

                          <div class="product-details-action">
                             
<button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                              

                                 
                                  
                              </div><!-- End .details-action-wrapper -->
                          </div><!-- End .product-details-action -->
                        </form>
                          <div class="product-details-footer">
                              <div class="product-cat">
                                  <span>Category:</span>

                                  <a href="{{url($getProduct->getCategory->slug)}}">{{$getProduct->getCategory->name}}</a>

                                 <a href="{{url($getProduct->getCategory->slug.'/'.$getProduct->getSubCategory->slug)}}">{{$getProduct->getSubCategory->name}}</a>

                              </div><!-- End .product-cat -->

                              <div class="social-icons social-icons-sm">
                                  <span class="social-label">Share:</span>
                                  <a href="{{url('https://www.facebook.com/')}}" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                          
                                
                              </div>
                          </div><!-- End .product-details-footer -->
                      </div><!-- End .product-details -->
                  </div><!-- End .col-md-6 -->
              </div><!-- End .row -->
          </div><!-- End .product-details-top -->
      </div><!-- End .container -->

      <div class="product-details-tab product-details-extended">
          <div class="container">
              <ul class="nav nav-pills justify-content-center" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                  </li>
               
                  {{-- <li class="nav-item">
                      <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                  </li> --}}
              </ul>
          </div><!-- End .container -->




          <div class="tab-content">
              <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                <div class="product-desc-content">
                  <div class="container">
                    {!! $getProduct->description !!}
                  </div><!-- End .container -->
              </div><!-- End .product-desc-content -->
              </div><!-- .End .tab-pane -->
              <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                  <div class="product-desc-content">
                      <div class="container">
                        {!! $getProduct->additional_information !!}
                      </div><!-- End .container -->
                  </div><!-- End .product-desc-content -->
              </div><!-- .End .tab-pane -->
              {{-- <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                  <div class="reviews">
                      <div class="container">
                          <h3>Reviews (2)</h3>
                          <div class="review">
                              <div class="row no-gutters">
                                  <div class="col-auto">
                                      <h4><a href="#">Samanta J.</a></h4>
                                      <div class="ratings-container">
                                          <div class="ratings">
                                              <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                          </div><!-- End .ratings -->
                                      </div><!-- End .rating-container -->
                                      <span class="review-date">6 days ago</span>
                                  </div><!-- End .col -->
                                  <div class="col">
                                      <h4>Good, perfect size</h4>

                                      <div class="review-content">
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                      </div><!-- End .review-content -->

                                      <div class="review-action">
                                          <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                          <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                      </div><!-- End .review-action -->
                                  </div><!-- End .col-auto -->
                              </div><!-- End .row -->
                          </div><!-- End .review -->

                          <div class="review">
                              <div class="row no-gutters">
                                  <div class="col-auto">
                                      <h4><a href="#">John Doe</a></h4>
                                      <div class="ratings-container">
                                          <div class="ratings">
                                              <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                          </div><!-- End .ratings -->
                                      </div><!-- End .rating-container -->
                                      <span class="review-date">5 days ago</span>
                                  </div><!-- End .col -->
                                  <div class="col">
                                      <h4>Very good</h4>

                                      <div class="review-content">
                                          <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                      </div><!-- End .review-content -->

                                      <div class="review-action">
                                          <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                          <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                      </div><!-- End .review-action -->
                                  </div><!-- End .col-auto -->
                              </div><!-- End .row -->
                          </div><!-- End .review -->
                      </div><!-- End .container -->
                  </div><!-- End .reviews -->
              </div><!-- .End .tab-pane --> --}}
          </div><!-- End .tab-content -->
      </div><!-- End .product-details-tab -->

    
  </div><!-- End .page-content -->
</main><!-- End .main -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  jQuery.noConflict();
  (function($) {
    $(document).ready(function(){
      $('.elevatezoom').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair"
      });
    });
  })(jQuery);
</script>
<script src="{{ url('assets/js/bootstrap-input-spinner.js') }}"></script>



<script src="{{url('assets/js/jquery.elevateZoom.min.js')}}"></script>

<script src="{{url('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('assets/js/jquery.elevateZoom.min.js')}}"></script>
@endsection



