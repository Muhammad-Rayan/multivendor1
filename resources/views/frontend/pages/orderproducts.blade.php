@extends('frontend.layout.master')
@section('content')
         <main class="main order">
            <!-- Start of PageContent -->
            <div class="page-content mb-10 pb-2">
                <div class="container">
                    
                    <!-- End of Order View -->

                    <div class="tab-pane mb-4 active in" id="account-orders">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title text-capitalize ls-normal mb-0">Order #{{$order->order_number}} Products </h4>
                                    </div>
                                </div>

                                <table class="shop-table account-orders-table mb-6">
                                               <thead>
                                        <tr>
                                            <th class="order-id">Name</th>
                                            <th class="order-date">Qty</th>
                                            <th class="order-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    @foreach($order->items as $products)
                                <tbody>
                                        <tr>
                                            <td class="order-id">{{ $products->product->name }}</td>
                                            <td class="order-date" style="text-align: center;">{{ $products->qty }}</td>
                                            @if($products->product->refund == 1)
                                                <td class="order-action" style="text-align: center;">
                                                    Refundable
                                                <td class="order-action" style="text-align: center;">
                                                    <a href="{{route('refund',$products->product->id)}}" class="btn btn-outline btn-default btn-block btn-sm btn-rounded">Refund</a>
                                                </td>
                                            @else
                                                <td class="order-action" style="text-align: center;">
                                                    Now Refundable
                                                <td class="order-action" style="text-align: center;">
                                                    
                                                </td>
                                            @endif
                                        </tr>
                                       
                                    </tbody>
                                    @endforeach
                                </table>

                            </div>

                    <!-- End of Order Details -->

                    <!-- End of Sub Orders-->

                    <!-- End of Account Address -->

                    <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Back To List</a>
                </div>
            </div>
            <!-- End of PageContent -->
         </main>
 @endsection