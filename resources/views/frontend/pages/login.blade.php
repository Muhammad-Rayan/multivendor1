@extends('frontend.layout.master')
@section('content')
<main class="main login-page">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">My Account</h1>
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
                                    <a href="#sign-in" class="nav-link active">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#sign-up" class="nav-link">Sign Up</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="sign-in">
                                    <div class="form-group">
                                        <label>Username or email address *</label>
                                        <input type="text" class="form-control" name="username" id="username" required>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Password *</label>
                                        <input type="text" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-checkbox" id="remember1" name="remember1" required="">
                                        <label for="remember1">Remember me</label>
                                        <a href="#">Last your password?</a>
                                    </div>
                                    <a href="#" class="btn btn-primary">Sign In</a>
                                </div>
                                <div class="tab-pane" id="sign-up">
                                    <div class="form-group">
                                        <label>Your email address *</label>
                                        <input type="text" class="form-control" name="email_1" id="email_1" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label>Password *</label>
                                        <input type="text" class="form-control" name="password_1" id="password_1" required>
                                    </div>
                                    <div class="checkbox-content login-vendor">
                                        <div class="form-group mb-5">
                                            <label>First Name *</label>
                                            <input type="text" class="form-control" name="first-name" id="first-name" required>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label>Last Name *</label>
                                            <input type="text" class="form-control" name="last-name" id="last-name" required>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label>Shop Name *</label>
                                            <input type="text" class="form-control" name="shop-name" id="shop-name" required>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label>Phone Number *</label>
                                            <input type="text" class="form-control" name="phone-number" id="phone-number" required>
                                        </div>
                                    </div>
                                  
                                   
                                    <a href="#" class="btn btn-primary">Sign Un</a>
                                </div>
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @endsection