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
                                <a href="{{route('account-detail',$accountdetail2['id'])}}" class="nav-new">Account details</a>
                            </li>
                        </ul>
                        <div class="tab-content mb-6">
                            

                          
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          
                            <div class="tab-pane active in" id="account-details">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                                    </div>
                                </div>
                                <form class="form account-details-form" action="{{route('account-detail-update',$accountdetail2['id']) }}" method="post">
                              @csrf
                                    <div class="form-group mb-6">
                                        <label for="email_1">Email address *</label>
                                        <input type="email" id="email_1" name="email" value="{{$accountdetail2['email']}}" class="form-control form-control-md">
                                    </div>
                                  

                                    <div class="form-group">
                                        <label class="text-dark" for="new-password">New Password </label>
                                        <input type="password" class="form-control form-control-md" id="new-password" name="password">
                                    </div>
                                    <div class="form-group mb-10">
                                        <label class="text-dark" for="conf-password">Confirm Password</label>
                                        <input type="password" class="form-control form-control-md" id="conf-password" name="conf_password">
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        @endsection