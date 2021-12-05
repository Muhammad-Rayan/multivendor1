@extends('frontend.layout.master')
@section('content')
<main class="main login-page">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Track Order</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
        
            <!-- End of Breadcrumb -->
            <div class="page-content">
                <div class="container">
                    <div class="login-popup" style="margin-left: auto; margin-right: auto;">
                        <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                            <ul class="nav nav-tabs text-uppercase" role="tablist">
                                <li class="nav-item">
                                    <a href="#sign-in" class="nav-link active">Track Order</a>
                                </li>
                              
                            </ul>
                                <form method="post" >
                                 @csrf
                                    <div class="form-group" style="margin-top: 15px;">
                                        <label>Enter Tracking Number</label>
                                        <input type="text" class="form-control" name="email" id="email" >
                                    </div>
                                    <div class="form-group" >
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" id="email" >
                                    </div>
                                  
                                  <button type="submit" class="btn btn-primary" style="margin-left: auto;margin-right: auto;margin-top: 15px;" >
                                        Track
                                    </button>
                                </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @endsection