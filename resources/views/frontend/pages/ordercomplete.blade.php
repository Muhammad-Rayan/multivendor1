@extends('frontend.layout.master')
@section('content')
         <main class="main order">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="passed"><a href="cart.html">Shopping Cart</a></li>
                        <li class="passed"><a href="checkout.html">Checkout</a></li>
                        <li class="active"><a href="order.html">Order Complete</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content mb-10 pb-2">
                <div class="container">
                    <div class="order-success text-center font-weight-bolder text-dark">
                        <i class="fas fa-check"></i>
                        Thank you. Your order has been received.
                    </div>
                    <!-- End of Order Success -->

                    <ul class="order-view list-style-none">
                        <li>
                            <label>Order number</label>
                            <strong>{{ $order->order_number }}</strong>
                        </li>
                        <li>
                            <label>Status</label>
                            <strong>{{ $order->delivery_status }}</strong>
                        </li>
                        <li>
                            <label>Date</label>
                            <strong>{{ date('d-m-Y', strtotime($order->created_at)) }}</strong>
                        </li>
                        <li>
                            <label>Total</label>
                            <strong>${{ $order->amount }}</strong>
                        </li>
                        <li>
                            <label>Payment method</label>
                            @if($order->cash_on_delivery == 1)
                            <strong>Cash On Delivery</strong>
                            @endif
                        </li>
                    </ul>
                    <!-- End of Order View -->

                    <div class="order-details-wrapper mb-5">
                        <h4 class="title text-uppercase ls-25 mb-5">Order Details</h4>
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th class="text-dark">Product</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $subtotal = 0  ?>
                                @foreach($order->items as $products)
                                <?php $subtotal += $products->total  ?>
                                <tr>
                                    <td>
                                        <a></a>{{ $products->product->name }} &nbsp;<strong>x {{ $products->qty }}</strong>
                                        
                                    </td>
                                    <td>${{ $products->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Subtotal:</th>
                                    <td>${{ $subtotal }}</td>
                                </tr>
                                <tr class="total">
                                    <th class="border-no">Total:</th>
                                    <td class="border-no">${{ $order->amount }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- End of Order Details -->

                    <!-- End of Sub Orders-->

                    <div id="account-addresses">
                        <div class="row">
                            <!-- <div class="col-sm-6 mb-8">
                                <div class="ecommerce-address billing-address">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                                <tr>
                                                    <td>John Doe</td>
                                                </tr>
                                                <tr>
                                                    <td>Conia</td>
                                                </tr>
                                                <tr>
                                                    <td>Wall Street</td>
                                                </tr>
                                                <tr>
                                                    <td>California</td>
                                                </tr>
                                                <tr>
                                                    <td>United States (US)</td>
                                                </tr>
                                                <tr>
                                                    <td>92020</td>
                                                </tr>
                                                <tr>
                                                    <td>1112223334</td>
                                                </tr>
                                                <tr class="email">
                                                    <td>nicework125@gmail.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                </div>
                            </div> -->
                            <div class="col-sm-6 mb-8">
                                <div class="ecommerce-address shipping-address">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                                <tr>
                                                    <td>{{ $order->first_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->last_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->company }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->street_address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->city }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $order->zip }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Account Address -->

                    <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Back To List</a>
                </div>
            </div>
            <!-- End of PageContent -->
         </main>
 @endsection