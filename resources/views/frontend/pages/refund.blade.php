@extends('frontend.layout.master')
@section('content')
<main class="main login-page">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Refund</h1>
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
                                    <a href="#sign-in" class="nav-link active">Refund</a>
                                </li>
                              
                            </ul>
                                 <form method="post" action="{{ route('refund-post',$id) }}" enctype="multipart/form-data">
                                 @csrf
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <textarea class="form-control" name="subject" id="exampleFormControlTextarea1" rows="3"></textarea>
                                     
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="desscription" id="exampleFormControlTextarea1" rows="3"></textarea>
                                      </div>
                                    <div class="form-group mb-0">
                                        <label>Image *</label>
                                        <input type="file" class="form-control" name="image" id="image" >
                                    </div>
                                  <button type="submit" class="btn btn-primary" style="margin-left: auto;margin-right: auto;margin-top: 20px;">
                                        Submit
                                    </button>
                                </form>
                         
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @endsection