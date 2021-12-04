@extends('frontend.layout.master')
@section('content')
<main class="main checkout">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="passed"><a href="cart.html">Shopping Cart</a></li>
                        <li class="active"><a href="checkout.html">Checkout</a></li>
                        <li><a href="order.html">Order Complete</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->


            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    @if(auth()->user() && auth()->user()->id && auth()->user()->is_user == 1)
                    <div class="">
                        Returning customer? <a href="{{ route('Userlogin') }}" class="font-weight-bold text-uppercase text-dark">Login</a>
                    </div>
                    @endif
                    <form class="form checkout-form" action="{{ route('checkout-post') }}" method="post">
                        @csrf
                        <div class="row mb-9">
                            <div class="col-lg-7 pr-lg-4 mb-4">
                                <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                    Billing Details
                                </h3>
                                <div class="row gutter-sm">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>First name *</label>
                                            <input type="text" class="form-control form-control-md" name="first_name" required="">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Last name *</label>
                                            <input type="text" class="form-control form-control-md" name="last_name" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Company name (optional)</label>
                                    <input type="text" class="form-control form-control-md" name="company_name">
                                </div>
                                <div class="form-group">
                                    <label>Country / Region *</label>
                                    <div class="select-box">
                                        <select name="country" class="form-control form-control-md">
                                            <option value="US" selected="selected">United States
                                                (US)
                                            </option>
                                            <option value="uk">United Kingdom (UK)</option>
                                            <option value="us">United States</option>
                                            <option value="fr">France</option>
                                            <option value="aus">Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Street address *</label>
                                    <input type="text" placeholder="House number and street name" class="form-control form-control-md mb-2" name="street_address" required="">
                                </div>
                                <div class="form-group">
                                  <label>Town / City *</label>
                                <input type="text" class="form-control form-control-md" name="city" required="">
                                    </div>
                                <div class="row gutter-sm">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label>State *</label>
                                            <div class="select-box">
                                                <select name="country" class="form-control form-control-md" name="state">
                                                    <option value="california" selected="selected">California</option>
                                                    <option value="uk">United Kingdom (UK)</option>
                                                    <option value="us">United States</option>
                                                    <option value="fr">France</option>
                                                    <option value="aus">Australia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>ZIP *</label>
                                            <input type="text" class="form-control form-control-md" name="zip" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Email address *</label>
                                    <input type="email" class="form-control form-control-md" name="email" required="">
                                    </div>
                                        <div class="form-group">
                                            <label>Phone *</label>
                                            <input type="text" class="form-control form-control-md" name="phone" required="">
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="form-group mt-3">
                                    <label for="order-notes">Order notes (optional)</label>
                                    <textarea class="form-control mb-0" id="order-notes" name="notes" cols="30" rows="4" placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                                <div class="pin-wrapper" style="height: 892.031px;"><div class="order-summary-wrapper sticky-sidebar" style="border-bottom: 1px solid rgb(238, 238, 238); width: 505px;">
                                    <h3 class="title text-uppercase ls-10">Your Order</h3>
                                    <div class="order-summary">
                                        <table class="order-table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">
                                                        <b>Product</b>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $total = 0;
                                                $shipping_rate = 0;
                                                $discount = 0;
                                            @endphp
                                            @if(session('cart'))
                                                @foreach(session('cart') as $id => $products)
                                                    @php $total += $products['price'] * $products['quantity'];
                                                    $discount += $products['discount'] * $products['quantity'];
                                                    if($products['shipping_flatrate'] == 1){
                                                        $shipping_rate += $products['shipping_costrate'];
                                                    }
                                                    @endphp
                                                        <tr class="bb-no">
                                                            <td class="product-name">{{ $products['name'] }} <i class="fas fa-times"></i> <span class="product-quantity">{{ $products['quantity'] }}</span></td>
                                                            <td class="product-total">${{ $products['price'] * $products['quantity'] }}</td>
                                                        </tr>
                                                @endforeach
                                            @endif
                                                <tr class="cart-subtotal bb-no">
                                                    <td>
                                                        <b>Subtotal</b>
                                                    </td>
                                                    <td>
                                                        <b>${{ $total }}</b>
                                                    </td>
                                                </tr>
                                                <tr class="cart-subtotal bb-no">
                                                    <td>
                                                        <b>Discount</b>
                                                    </td>
                                                    <td>
                                                        <b>${{ $discount }}</b>
                                                    </td>
                                                </tr>
                                                <tr class="cart-subtotal bb-no">
                                                    <td>
                                                        <b>Shipping</b>
                                                    </td>
                                                    <td>
                                                        <b>${{ $shipping_rate }}</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                
                                                <tr class="order-total">
                                                    <th>
                                                        <b>Total</b>
                                                    </th>
                                                    <td>
                                                        <b>${{ $total - $discount - $shipping_rate }}</b>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <div class="payment-methods" id="payment_method">
                                            <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                            <div class="accordion payment-accordion">
                                                
                                                <div class="card">
                                                    <div class="card-header">
                                                        <input type="radio" name="cash_on_delivery" value="1">
                                                        <label>Cash On Delivery</label>
                                                    </div>
                                                    <div id="delivery" class="card-body">
                                                        <p class="mb-0">
                                                            Pay with cash upon delivery.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group place-order pt-6">
                                            <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                        </div>
                                    </div>
                                </div></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
@endsection