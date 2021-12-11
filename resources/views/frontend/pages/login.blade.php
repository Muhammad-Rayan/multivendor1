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
                              
                            </ul>
                            <div class="tab-content">
                                <form method="post" action="{{ route('Userlogin-data') }}">
                                 @csrf
                                    <div class="form-group">
                                        <label>Username or email address *</label>
                                        <input type="text" class="form-control" name="email" id="email" >
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Password *</label>
                                        <input type="password" class="form-control" name="password" id="password" >
                                    </div>
                                  <button type="submit" class="btn btn-primary">
                                        Sign In
                                    </button>
                                </form>
                                <hr>
                                <a href="{{ route('user-register') }}" class="btn btn-primary" style="margin-top: 20px;">
                                        Create New Account
                                    </a>
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @endsection