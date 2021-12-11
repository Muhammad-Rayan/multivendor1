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
                                    <a href="#sign-in" class="nav-link active">Sign Up</a>
                                </li>
                              
                            </ul>
                            <div class="tab-content">
                                <form method="post" action="{{ route('user-register') }}">
                                 @csrf
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="email" >
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="email" >
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" name="phone" id="email" >
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" id="email" >
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Password *</label>
                                        <input type="password" class="form-control" name="password" id="password" >
                                    </div>
                                  <button type="submit" class="btn btn-primary" style="margin-top: 20px;">
                                        Sign Up
                                    </button>
                                </form>
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @endsection