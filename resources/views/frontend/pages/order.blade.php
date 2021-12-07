@extends('frontend.layout.master')
@section('content')

<main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">My Account</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="demo1.html">Home</a></li>
                        <li>My account</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                            <li class="nav-item">
                                <a href="{{route('user-dashboard')}}" class="nav-new ">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('order')}}" class="nav-new">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('account-detail',$accountdetail1->id)}}" class="nav-new">Account details</a>
                            </li>
                        </ul>


                     <div class="tab-content mb-6">
                        

                            <div class="tab-pane mb-4 active in" id="account-orders">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                    </div>
                                </div>

                                <table class="shop-table account-orders-table mb-6">
                                               <thead>
                                        <tr>
                                            <th class="order-id">Order</th>
                                            <th class="order-date">Date</th>
                                            <th class="order-status">Status</th>
                                            <th class="order-total">Total</th>
                                            <th class="order-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    @foreach($order as $orde)
                                <tbody>
                                        <tr>
                                            <td class="order-id">{{ $orde->order_number }}</td>
                                            <td class="order-date">{{ $orde->order_date  }}</td>
                                            <td class="order-status">{{ $orde->delivery_status }}</td>
                                            <td class="order-total">
                                                <span class="order-price">{{ $orde->subtotal }}</span>
                                            </td>
                                            <td class="order-action">
                                                <a href="{{route('ordercomplete',$orde->order_number)}}" class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                    @endforeach
                                </table>

                                     </div>

                           

                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        @endsection