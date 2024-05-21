@extends('layouts.appp')

@section('style')
@endsection

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <form action="{{ route('placeorder') }}" id="checkoutForm" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>First Name *</label>
                                    <input type="text" class="form-control" required name="firstname" value="{{!empty(Auth::user()->name) ? Auth::user()->name : ''}}">
                                </div>
                                <div class="col-sm-6">
                                    <label>Last Name *</label>
                                    <input type="text" class="form-control" required name="lastname" value="{{!empty(Auth::user()->lastname) ? Auth::user()->lastname : ''}}">
                                </div>
                            </div>
                            <label>Street address *</label>
                            <input type="text" class="form-control" placeholder="House number and Street name" required name="streetaddress" value="{{!empty(Auth::user()->streetaddress) ? Auth::user()->streetaddress : ''}}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Town / City *</label>
                                    <input type="text" class="form-control" required name="town" value="{{!empty(Auth::user()->town) ? Auth::user()->town : ''}}">
                                </div>
                                <div class="col-sm-6">
                                    <label>State / County *</label>
                                    <input type="text" class="form-control" required name="state" value="{{!empty(Auth::user()->state) ? Auth::user()->state : ''}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Postcode / ZIP *</label>
                                    <input type="text" class="form-control" required name="postcode" value="{{!empty(Auth::user()->postcode) ? Auth::user()->postcode : ''}}">
                                </div>
                                <div class="col-sm-6">
                                    <label>Phone *</label>
                                    <input type="tel" class="form-control" required name="phone" value="{{!empty(Auth::user()->phone) ? Auth::user()->phone : ''}}">
                                </div>
                            </div>
                            <label>Email address *</label>
                            <input type="email" class="form-control" required name="email" value="{{!empty(Auth::user()->email) ? Auth::user()->email : ''}}">
                        </div>
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3>
                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::getContent() as $cart)
                                            @php
                                                $getCartProduct = App\Models\ProductModel::getSingle($cart->id);
                                            @endphp
                                            <tr>
                                                <td><a href="{{ url($getCartProduct->slug) }}">{{ $getCartProduct->title }}</a></td>
                                                <td>${{ number_format($getCartProduct->price * $cart->quantity, 2) }}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>${{ number_format(Cart::getSubTotal(), 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>${{ number_format(Cart::getSubTotal() + 60.00, 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="cash" value="cash" name="payment_method" required class="custom-control-input">
                                        <label for="cash" class="custom-control-label">Cash On Delivery</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="creditcard" value="stripe" name="payment_method" required class="custom-control-input">
                                        <label for="creditcard" class="custom-control-label">Credit Card</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div>
                        </aside>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script>

</script>
@endsection
