<header class="header">
  <div class="header-top">
      <div class="container">
          <div class="header-left">
              
          </div><!-- End .header-left -->

          <div class="header-right">
              <ul class="top-menu">
                  <li>
                      <a href="#">Links</a>
                      <ul>
                          <li><a href="tel:#"><i class="icon-phone"></i>Call: 00011122234</a></li>
                         
                          <li><a href="{{url('about')}}">About Us</a></li>
                          <li><a href="{{url('contact')}}">Contact Us</a></li>
                          @if (session()->has('user_id'))
                          <li><a href="{{ route('user.editprofile') }}"><i class="icon-user"></i> {{ session('user_name') }}</a>
                          </li>
                      @else
                          <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i> Login</a></li>
                      @endif
                      @if (in_array(session('user_role'), ['admin', 'moderator']))
                      <li><a href="{{ url('/admin') }}"> Admin Panel</a></li>
                  @endif
                      </ul>
                  </li>
              </ul><!-- End .top-menu -->
          </div><!-- End .header-right -->
      </div><!-- End .container -->
  </div><!-- End .header-top -->

  <div class="header-middle sticky-header">
      <div class="container">
          <div class="header-left">
              <button class="mobile-menu-toggler">
                  <span class="sr-only">Toggle mobile menu</span>
                  <i class="icon-bars"></i>
              </button>

              {{-- <a href="{{url('')}}" class="logo">
                  <img src="{{url('assets/images/logo.png')}}" alt="" width="105" height="25">
              </a> --}}

              <nav class="main-nav">
                  <ul class="menu sf-arrows">
                      <li class="megamenu-container active">
                          <a href="{{url('')}}">Home </a>

                   
                      </li>
                      <li>
                          <a href="javascript:;" class="sf-with-ul">Products</a>

                          <div class="megamenu megamenu-md">
                              <div class="row no-gutters">
                                  <div class="col-md-12">
                                      <div class="menu-col">
                                          <div class="row">
@php
    $getCategoryHeader = App\Models\CategoryModel :: getRecordMenu()
@endphp
@foreach ($getCategoryHeader as $value_h_c)
    
   @if (!empty($value_h_c->getSubCategory->count()))
                  


                                              <div class="col-md-4">
                                                  <a href="{{url($value_h_c->slug)}}" class="menu-title">{{$value_h_c->name}}</a><!-- End .menu-title -->
                                                  <ul>
                                                    @foreach ($value_h_c->getSubCategory as $value_h_sub)
                                                        
                                                    <li><a href="{{url($value_h_c->slug.'/'.$value_h_sub->slug)}}">{{$value_h_sub->name}}</a></li>

                                                    @endforeach
                                                   

                                                    
                                                  </ul>

                                                
                                              </div><!-- End .col-md-6 --> 
                                              @endif
                                              @endforeach
                                           
                                  
                              </div><!-- End .row -->
                          </div><!-- End .megamenu megamenu-md -->
                      </li>
                
                    
                  </ul><!-- End .menu -->
              </nav><!-- End .main-nav -->
          </div><!-- End .header-left -->

          <div class="header-right">
              <div class="header-search">
                  <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                  <form action="{{ route('product.search') }}" method="post">
                    @csrf
                    <div class="header-search-wrapper">
                        <label for="q" class="sr-only">Search</label>
                        <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." value="{{ request()->get('q') }}" required>
                    </div>
                </form>
                
              </div><!-- End .header-search -->

              <div class="dropdown cart-dropdown">
                  <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                      <i class="icon-shopping-cart"></i>
                      <span class="cart-count">{{Cart::getContent()->count()}}</span>
                  </a>

                  @if(!empty(Cart::getContent()->count()))
                  <div class="dropdown-menu dropdown-menu-right">
                      <div class="dropdown-cart-products">
                        @foreach (Cart::getContent() as $header_cart)

@php
$getCartProduct = App\Models\ProductModel::getSingle($header_cart->id)  ;

    
@endphp
@if(!empty($getCartProduct))
@php

    $getProductImage = $getCartProduct->getImageSingle($getCartProduct->id);
    
@endphp
                        <div class="product">
                            <div class="product-cart-details">
                                <h4 class="product-title">
                                    <a href="{{url($getCartProduct->slug)}}">{{ $header_cart->id }}
                                    {{$getCartProduct->title}}</a>
                                </h4>
                                <span class="cart-product-info">
                                    <span class="cart-product-qty">{{ $header_cart->quantity }}</span>
                                    x ${{ number_format($header_cart->price,2) }}
                                </span>
                            </div><!-- End .product-cart-details -->
                            <figure class="product-image-container">
                                <a href="{{url($getCartProduct->slug)}}" class="product-image">
                                    <img src="{{ $getProductImage->getLogo() }}" alt="product">
                                </a>
                            </figure>
                            <a href="{{url('cart/delete/'.$header_cart->id)}}" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                        </div><!-- End .product -->
                        @endif
                        @endforeach

                     
                      </div><!-- End .cart-product -->

                      <div class="dropdown-cart-total">
                          <span>Total</span>

                          <span class="cart-total-price">${{number_format(Cart::getSubTotal(),2)}}</span>
                      </div><!-- End .dropdown-cart-total -->

                      <div class="dropdown-cart-action">
                        <a href="/cart" class="btn btn-primary">View Cart</a>


                          <a href="{{url('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                      </div><!-- End .dropdown-cart-total -->
                  </div><!-- End .dropdown-menu -->
                  @endif
              </div><!-- End .cart-dropdown -->
          </div><!-- End .header-right -->
      </div><!-- End .container -->
  </div><!-- End .header-middle -->
</header><!-- End .header -->