<html lang="en">
   <!--begin::Head-->
   <head>
      <title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel by Keenthemes</title>
      <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free.">
      <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <meta property="og:locale" content="en_US">
      <meta property="og:type" content="article">
      <meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme">
      <meta property="og:url" content="https://keenthemes.com/metronic">
      <meta property="og:site_name" content="Keenthemes | Metronic">
      <!--begin::Fonts-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
      <!--end::Fonts-->
      <!--begin::Global Stylesheets Bundle(used by all pages)-->
      <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css">
      <!--end::Global Stylesheets Bundle-->
   </head>
   <!--end::Head-->
   <!--begin::Body-->
   <body id="kt_body" class="bg-body">
      <!--begin::Main-->
      <div class="d-flex flex-column flex-root">
      <!--begin::Authentication - Sign-in -->
      <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(https://preview.keenthemes.com/metronic8/demo1/assets/media/illustrations/dozzy-1/14.png">
      <!--begin::Content-->
      <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
      <!--begin::Logo-->
      <a href="../../demo3/dist/index.html" class="mb-12">
      <img alt="Logo" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/logos/logo-1.svg" class="h-40px">
      </a>
      <!--end::Logo-->
      <!--begin::Wrapper-->
      <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
         <!--begin::Form-->
         <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('register') }}">
            @csrf
            <!--begin::Heading-->
            <div class="mb-10 text-center">
               <!--begin::Title-->
               <h1 class="text-dark mb-3">Seller</h1>
               <!--end::Title-->
               <!--begin::Link-->
               <div class="text-gray-400 fw-bold fs-4">
                  Add more Information?
                  <!--end::Link-->
               </div>
            </div>
               <div class="col-12">
                  <div class="row">
                     <div class="row fv-row mb-7 fv-plugins-icon-container col-6">
                        <!--begin::Col-->
                        <label class="form-label fw-bolder text-dark fs-6">First Name</label>
                        <input type="text" class="form-control form-control-lg " name="first_name" required>
                     </div>
                     <div class="row fv-row mb-7 fv-plugins-icon-container col-6" style="margin-left:10px;">
                        <!--begin::Col-->
                        <label class="form-label fw-bolder text-dark fs-6">Last Name</label>
                        <input type="text" class="form-control form-control-lg " name="last_name" required >
                     
                     </div>
                  </div>
               </div>
               <div class="col-12">
                  <div class="row fv-row mb-7 fv-plugins-icon-container ">
                     <!--begin::Col-->
                     <label class="form-label fw-bolder text-dark fs-6">Address</label>
                     <input type="text" class="form-control form-control-lg " name="address" required>
                    
                  </div>
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <!-- <div class="col-12">
                  <div class="row">
                     <div class="row fv-row mb-7 fv-plugins-icon-container col-6">
                        <label class="form-label fw-bolder text-dark fs-6">Country</label>
                        <input type="text" class="form-control form-control-lg" name="country_id" required>
                        @error('country_id')
                        <div class="fv-plugins-message-container invalid-feedback">  
                           <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                     </div>
                     <div class="row fv-row mb-7 fv-plugins-icon-container col-6" style="margin-left:10px;">
                        <label class="form-label fw-bolder text-dark fs-6">City</label>
                        <input type="text" class="form-control form-control-lg " name="city_id" required>
                        @error('city_id')
                        <div class="fv-plugins-message-container invalid-feedback">  
                           <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                     </div>
                  </div>
               </div> -->
               <div class="col-12">
                  <div class="row">
                     <div class="row fv-row mb-7 fv-plugins-icon-container col-6">
                        <!--begin::Col-->
                        <label class="form-label fw-bolder text-dark fs-6">Postal Code</label>
                        <input type="text" class="form-control form-control-lg " name="postal_code" required >
                      
                     </div>
                     <div class="row fv-row mb-7 fv-plugins-icon-container col-6" style="margin-left:10px;">
                        <!--begin::Col-->
                        <label class="form-label fw-bolder text-dark fs-6">Phone</label>
                        <input type="text" class="form-control form-control-lg " name="phone" required>
                        @error('phone')
                        <div class="fv-plugins-message-container invalid-feedback">  
                           <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                     </div>
                  </div>
               </div>
               <div class="col-12">
                  <div class="row fv-row mb-7 fv-plugins-icon-container ">
                     <!--begin::Col-->
                     <label class="form-label fw-bolder text-dark fs-6">Email</label>
                     <input type="email" class="form-control form-control-lg form-control-solid " name="email" required>
                    
                  </div>
               </div>
               <div class="col-12">
                  <div class="row fv-row mb-7 fv-plugins-icon-container ">
                     <!--begin::Col-->
                     <label class="form-label fw-bolder text-dark fs-6">Shop Name</label>
                     <input type="email" class="form-control form-control-lg form-control-solid " name="shopname" required>
                    
                  </div>
               </div>
               <div class="col-12">
                  <div class="row fv-row mb-7 fv-plugins-icon-container ">
                     <!--begin::Col-->
                     <label class="form-label fw-bolder text-dark fs-6">Shop Address</label>
                     <input type="email" class="form-control form-control-lg form-control-solid " name="shopaddress" required>
                    
                  </div>
               </div>
                
               <!--end::Input group-->
               <!--begin::Actions-->
               <div class="text-center">
                  <button  type="submit" class="btn btn-lg btn-primary">
                Submit
                  </button>
               </div>
                  <div>
                     <!--end::Input group-->
                     <!--begin::Input group-->
         </form>
         <!--end::Form-->
         </div>
         <!--end::Wrapper-->
         </div>
         <!--end::Content-->
         <!--begin::Footer-->
         <!--end::Footer-->
         </div>
         <!--end::Authentication - Sign-in-->
      </div>
   </body>
</html>