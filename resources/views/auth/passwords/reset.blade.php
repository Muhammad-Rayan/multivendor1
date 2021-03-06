
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
                  <form method="POST" action="{{ route('password.update') }}">
                     @csrf
                     <input type="hidden" name="token" value="{{ $token }}">

                  <div class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework">
                     <!--begin::Heading-->
                     <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">{{ __('Reset Password') }}</h1>
                        </div>
                     <!--begin::Heading-->
                     <!--begin::Input group-->
               
                     <div class="fv-row mb-10 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">{{ __('E-Mail Address') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid  @error('email') is-invalid @enderror"  type="email" name="email" value="{{ $email ?? old('email') }}" autocomplete="off">
                        <!--end::Input-->
                        
                        @error('email')
                        <div class="fv-plugins-message-container invalid-feedback">
                        <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                     </div>
                     
                     <!--end::Input group-->
                     <!--begin::Input group-->
                     <div class="fv-row mb-10 fv-plugins-icon-container">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-2">
                           <!--begin::Label-->
                           <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Password') }}</label>
                           <!--end::Label-->
                           <!--begin::Link-->
                           
                           <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"  id="password" type="password"  name="password"  autocomplete="current-password">
                        <!--end::Input-->
                        @error('password')
                             
                        <div class="fv-plugins-message-container invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                
                        </div>
                        @enderror
                     </div>
                     <div class="fv-row mb-5 fv-plugins-icon-container">
								<label class="form-label fw-bolder text-dark fs-6">{{ __('Confirm Password') }}</label>
								<input class="form-control form-control-lg form-control-solid"id="password-confirm" type="password"  name="password_confirmation"   autocomplete="new-password">
							<div class="fv-plugins-message-container invalid-feedback"></div></div>
					
                     <!--end::Input group-->
                     <!--begin::Actions-->
                     <div class="text-center">
                        <!--begin::Submit button-->
                        <button class="btn btn-lg btn-primary w-100 mb-5" type="submit">
                        {{ __('Reset Password') }}
                        </button>
                        <!--end::Submit button-->
                        <!--begin::Separator-->
                     </div>
                     <!--end::Actions-->
                     <div></div>
                  </div>
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