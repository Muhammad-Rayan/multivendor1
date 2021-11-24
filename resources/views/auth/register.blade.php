
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
                  <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('register_post') }}">
					@csrf
                  <!--begin::Heading-->
							<div class="mb-10 text-center">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">{{ __('Register') }}</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Already have an account?
								<a href="../../demo1/dist/authentication/flows/basic/sign-in.html" class="link-primary fw-bolder">Sign in here</a></div>
								<!--end::Link-->
							</div>
							<div class="row fv-row mb-7 fv-plugins-icon-container">
								<!--begin::Col-->
									<label class="form-label fw-bolder text-dark fs-6">{{ __('Name') }}</label>
									<input type="text" class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"    autocomplete="name" autofocus>
                                    @error('name')
                                
                                    <div class="fv-plugins-message-container invalid-feedback">  
                                          <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                            </div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-7 fv-plugins-icon-container">
								<label class="form-label fw-bolder text-dark fs-6">{{ __('E-Mail Address') }}</label>
								<input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" id="email" type="email"  name="email" value="{{ old('email') }}"    autocomplete="email">
							
                                @error('email')
                                <div class="fv-plugins-message-container invalid-feedback">
                                <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
								<!--begin::Wrapper-->
								<div class="mb-1">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6">{{ __('Password') }}</label>
									<!--end::Label-->
									<!--begin::Input wrapper-->
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" id="password" type="password"  name="password"   autocomplete="new-password">
									
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
										</span>
                                        @error('password')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
									<!--end::Input wrapper-->
									<!--begin::Meter-->
									<!--end::Meter-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Hint-->
								<div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
								<!--end::Hint-->
							<div class="fv-plugins-message-container invalid-feedback"></div></div>
							<!--end::Input group=-->
							<!--begin::Input group-->
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label class="form-label fw-bolder text-dark fs-6">{{ __('Confirm Password') }}</label>
								<input class="form-control form-control-lg form-control-solid"id="password-confirm" type="password"  name="password_confirmation"   autocomplete="new-password">
							<div class="fv-plugins-message-container invalid-feedback"></div></div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10 fv-plugins-icon-container">
								<label class="form-check form-check-custom form-check-solid form-check-inline">
									<input class="form-check-input" type="checkbox" name="toc" value="1">
									<span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
									<a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
								</label>
							<div class="fv-plugins-message-container invalid-feedback"></div></div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<button  type="submit" class="btn btn-lg btn-primary">
                                {{ __('Register') }}
                           	</button>
							</div>
							<!--end::Actions-->
						<div></div></form>
                    
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