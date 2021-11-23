<template>
  <!--begin::Wrapper-->
  <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <Form
      class="form w-100"
      id="kt_login_signin_form"
      @submit="onSubmitLogin"
      :validation-schema="login"
    >
      <!--begin::Heading-->
      <div class="text-center mb-10">
        <!--begin::Title-->
        <h1 class="text-dark mb-3">Sign In to Metronic</h1>
        <!--end::Title-->

        <!--begin::Link-->
        <div class="text-gray-400 fw-bold fs-4">
          New Here?

          <router-link to="/sign-up" class="link-primary fw-bolder">
            Create an Account
          </router-link>
        </div>
        <!--end::Link-->
      </div>
      <!--begin::Heading-->

      <div class="mb-10 bg-light-info p-8 rounded">
        <div class="text-info">
          Use account <strong>admin@demo.com</strong> and password
          <strong>demo</strong> to continue.
        </div>
      </div>

      <!--begin::Input group-->
      <div class="col-5">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Color Code</span>
                </label>
                <el-form-item prop="targetTitle">
                    <el-input
                    v-model=""
                    placeholder="Enter Color Code"
                    ></el-input>
              </el-form-item>
             
            </div>
              <div class="col-5">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Color Code</span>
                </label>
                <el-form-item prop="targetTitle">
                    <el-input
                    v-model=""
                    placeholder="Enter Color Code"
                    ></el-input>
              </el-form-item>
             
            </div>
      <div class="fv-row mb-10">
      <div class="col-5">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Color Code</span>
                </label>
                <el-form-item prop="targetTitle">
                    <el-input
                    v-model=""
                    placeholder="Enter Color Code"
                    ></el-input>
              </el-form-item>
             
            </div>
              <div class="col-5">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Color Code</span>
                </label>
                <el-form-item prop="targetTitle">
                    <el-input
                    v-model=""
                    placeholder="Enter Color Code"
                    ></el-input>
              </el-form-item>
             
            </div>
     
      </div>
      <!--end::Input group-->

      <!--begin::Input group-->
      <div class="fv-row mb-10">
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack mb-2">
          <!--begin::Label-->
          <label class="form-label fw-bolder text-dark fs-6 mb-0"
            >Password</label
          >
          <!--end::Label-->

          <!--begin::Link-->
          <router-link to="/password-reset" class="link-primary fs-6 fw-bolder">
            Forgot Password ?
          </router-link>
          <!--end::Link-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Input-->
        <Field
          class="form-control form-control-lg form-control-solid"
          type="password"
          name="password"
          autocomplete="off"
        />
        <!--end::Input-->
        <div class="fv-plugins-message-container">
          <div class="fv-help-block">
            <ErrorMessage name="password" />
          </div>
        </div>
      </div>
      <!--end::Input group-->

      <!--begin::Actions-->
      <div class="text-center">
        <!--begin::Submit button-->
        <button
          type="submit"
          ref="submitButton"
          id="kt_sign_in_submit"
          class="btn btn-lg btn-primary w-100 mb-5"
        >
          <span class="indicator-label"> Continue </span>

          <span class="indicator-progress">
            Please wait...
            <span
              class="spinner-border spinner-border-sm align-middle ms-2"
            ></span>
          </span>
        </button>
        <!--end::Submit button-->

        <!--begin::Separator-->
     
        <!--end::Google link-->
      </div>
     
    </Form>
    <!--end::Form-->
  </div>
  <!--end::Wrapper-->
</template>

