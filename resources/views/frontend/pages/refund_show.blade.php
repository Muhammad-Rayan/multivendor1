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
                                        <h4 class="icon-box-title text-capitalize ls-normal mb-0">Refund </h4>
                                    </div>
                                </div>

                                <table class="shop-table account-orders-table mb-6">
                                    <thead>
                                        <tr>
                                            <th class="order-id">Product</th>
                                            <th class="order-date">Subject</th>
                                            <th class="order-actions">Description</th>
                                            <th class="order-actions">Status</th>
                                        </tr>
                                    </thead>
                                    @foreach($refund as $refund_row)
                                    <tbody>
                                        <tr>
                                            <td class="order-id">{{ $refund_row->product->name }}</td>
                                            <td class="order-date" style="text-align: center;">{{ $refund_row->subject }}</td>
                                            <td class="order-date" style="text-align: center;">{{ $refund_row->description }}</td>
                                            @if($refund_row->status == 1)
                                                <td class="order-action" style="text-align: center;">
                                                    Request
                                                </td>
                                            @elseif($refund_row->status == 2)
                                                <td class="order-action" style="text-align: center;">
                                                    Approve
                                                </td>
                                            @else
                                                <td class="order-action" style="text-align: center;">
                                                    Cancel
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