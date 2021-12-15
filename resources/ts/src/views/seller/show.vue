<template>
   <!--begin::details View-->
   <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
      <!--begin::Card header-->
      <!--begin::Card header-->
      <!--begin::Card body-->
      <div class="card-body p-9">
         <!--begin::Row-->
         <div class="row g-5 g-xl-8">
            <div class="col-xl-3">
               <!--begin::Statistics Widget 5-->
               <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                  <!--begin::Body-->
                  <div class="card-body">
                     <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                     <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                           <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"></rect>
                           <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black"></rect>
                           <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"></rect>
                           <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"></rect>
                        </svg>
                     </span>
                     <!--end::Svg Icon-->
                     <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ this.total_products }}</div>
                     <div class="fw-bold text-white">Products</div>
                  </div>
                  <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
            </div>
            <div class="col-xl-3">
               <!--begin::Statistics Widget 5-->
               <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                  <!--begin::Body-->
                  <div class="card-body">
                     <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                     <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                           <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black"></path>
                           <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black"></path>
                           <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black"></path>
                        </svg>
                     </span>
                     <!--end::Svg Icon-->
                     <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{ this.total_orders }}</div>
                     <div class="fw-bold text-gray-100">Total Orders</div>
                  </div>
                  <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
            </div>
            <div class="col-xl-3">
               <!--begin::Statistics Widget 5-->
               <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                  <!--begin::Body-->
                  <div class="card-body">
                     <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                     <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                           <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black"></path>
                           <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black"></path>
                        </svg>
                     </span>
                     <!--end::Svg Icon-->
                     <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ this.total_earning }}</div>
                     <div class="fw-bold text-white">Total Earning</div>
                  </div>
                  <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
            </div>
            <div class="col-xl-3">
               <!--begin::Statistics Widget 5-->
               <a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                  <!--begin::Body-->
                  <div class="card-body">
                     <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                     <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                           <path opacity="0.3" d="M10.9607 12.9128H18.8607C19.4607 12.9128 19.9607 13.4128 19.8607 14.0128C19.2607 19.0128 14.4607 22.7128 9.26068 21.7128C5.66068 21.0128 2.86071 18.2128 2.16071 14.6128C1.16071 9.31284 4.96069 4.61281 9.86069 4.01281C10.4607 3.91281 10.9607 4.41281 10.9607 5.01281V12.9128Z" fill="black"></path>
                           <path d="M12.9607 10.9128V3.01281C12.9607 2.41281 13.4607 1.91281 14.0607 2.01281C16.0607 2.21281 17.8607 3.11284 19.2607 4.61284C20.6607 6.01284 21.5607 7.91285 21.8607 9.81285C21.9607 10.4129 21.4607 10.9128 20.8607 10.9128H12.9607Z" fill="black"></path>
                        </svg>
                     </span>
                     <!--end::Svg Icon-->
                     <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ this.successful_order }}</div>
                     <div class="fw-bold text-white">Successful Order</div>
                  </div>
                  <!--end::Body-->
               </a>
               <!--end::Statistics Widget 5-->
            </div>
         </div>
         <!--end::Input group-->
         <!--begin::Input group-->
         <!--end::Input group-->
      </div>
      <!--end::Card body-->
   </div>
   <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
      <!--begin::Card header-->
      <div class="card-header cursor-pointer">
         <!--begin::Card title-->
         <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Profile Details</h3>
         </div>
         <!--end::Card title-->
         <!--begin::Action-->
         <!--end::Action-->
      </div>
      <!--begin::Card header-->
      <!--begin::Card body-->
      <div class="card-body p-9">
         <!--begin::Row-->
         <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Full Name</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
               <span class="fw-bolder fs-6 text-dark" v-if="model.user_info != null">{{ model.user_info.first_name }}</span>
            </div>
            <!--end::Col-->
         </div>
         <!--end::Row-->
         <!--begin::Input group-->
         <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Last Name</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
               <span class="fw-bold fs-6" v-if="model.user_info != null">{{ model.user_info.last_name }}</span>
            </div>
            <!--end::Col-->
         </div>
         <!--end::Input group-->
         <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Address</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
               <span class="fw-bold fs-6" v-if="model.user_info != null">{{ model.user_info.address }}</span>
            </div>
            <!--end::Col-->
         </div>
         <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Postal Code</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
               <span class="fw-bold fs-6" v-if="model.user_info != null">{{ model.user_info.postal_code }}</span>
            </div>
            <!--end::Col-->
         </div>
         <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Email</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
               <span class="fw-bold fs-6">{{ model.email }}</span>
            </div>
            <!--end::Col-->
         </div>
         <!--begin::Input group-->
         <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">
            Contact Phone
            <i
               class="fas fa-exclamation-circle ms-1 fs-7"
               data-bs-toggle="tooltip"
               title="Phone number must be active"
               ></i>
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
               <span class="fw-bolder fs-6 me-2" v-if="model.user_info != null">{{ model.user_info.phone}}</span>
            </div>
            <!--end::Col-->
         </div>
         <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">
            Shop Name
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
               <span class="fw-bolder fs-6 me-2" v-if="model.user_info != null">{{ model.user_info.shopname}}</span>
            </div>
            <!--end::Col-->
         </div>
         <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">
            Shop Address
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
               <span class="fw-bolder fs-6 me-2" v-if="model.user_info != null">{{ model.user_info.shopaddress}}</span>
            </div>
            <!--end::Col-->
         </div>
         <!--end::Input group-->
         <!--begin::Input group-->
         <!--end::Input group-->
      </div>
      <!--end::Card body-->
   </div>
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
  
     <div class="card-body py-3">
      <!--begin::Table container-->
      <div class="table-responsive">
        <!--begin::Table-->
        <table
          class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3"
        >
          <!--begin::Table head-->
          <thead>
            <tr class="fw-bolder text-muted">
              <th>ID</th>
              <th>Name</th>
              <th>Color</th>
              <th>Price</th>
              <th>Stock</th>
            </tr>
          </thead>
          <!--end::Table head-->

          <!--begin::Table body-->
          <tbody>
            <template v-for="(item, index) in model.products" :key="index">
              <tr>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                    {{ item.id }}
                </td>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                    {{ item.name }}
                </td>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                     Color
                </td>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                   Price
                </td>
                 <td class="text-dark fw-bolder text-hover-primary fs-6">
                   Stock
                </td>
                <td v-if="item.active == 1">
                  <span class="badge badge-light-primary">Active</span>
                </td>
                <td v-else>
                  <span class="badge badge-light-danger">In Active</span>
                </td>
               
                
              </tr>
            </template>
          </tbody>
          <!--end::Table body-->
        </table>
        <!--end::Table-->
        <div class="panel-footer">
              <div class="row">
                <div class="col col-1">
                    <select class="form-control form-inline form-sm"
                        title="Items per page" @change="updatePerPage"
                        v-model="params.per_page">
                        <option>12</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                        <option>500</option>
                    </select>
                </div>
                <div class="col col-3" style="margin-top: 11px;">
                    <small class="pagination-status">
                        Showing {{model.from}} - {{model.to}} of {{model.total}}
                    </small>
                </div>
                <div class="col col-5"></div>
                <div class="col col-3">
                  <div class="pagination-controls">
                    <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" style="width: 79px;color: black;" :disabled="!model.prev_page_url"
                        @click="prevPage">
                        &laquo; Prev
                    </button>
                    <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" style="width: 79px;color: black;margin-left: 10px;" :disabled="!model.next_page_url"
                        @click="nextPage">
                        Next &raquo;
                    </button>
                  </div>
                </div>
              </div>
            <div class="pagination">
                <div class="pagination-page">
                    
                    
                </div>
                
            </div>
        </div>
      </div>
      <!--end::Table container-->
    </div>
    </div>
   <!--end::details View-->
   <!--begin::Row-->
</template>
<script type="text/javascript">
   import Dropdown2 from "@/components/dropdown/Dropdown2.vue";
   
   import { get,byMethod } from '@/lib/api'
   import { copyObject } from '@/lib/helpers'
   import { useToast } from "vue-toastification"
   
   export default ({
     name: "kt-widget-12",
     data() {
           return {
               model: [],
               resource:'/api/seller',
               params: { 
                 per_page: 12,
                 page: 1,
                 q: '',
                 sort_column: this.$route.query.sort_column|| this.defaultSortColumn,
                 sort_direction: this.$route.query.sort_direction || this.defaultSortDirection
               },
           }
       },
       beforeRouteUpdate (to, from, next) {
           this.show = false
           get(`/api/seller/${to.params.id}`)
               .then(res => {
                   this.setData(res)
                   next()
               })
               //catch 422
       },
       beforeRouteEnter(to, from, next) {
           get(`/api/seller/${to.params.id}`)
               .then(res => {
                   next(vm => vm.setData(res))
               })
               // catch 422
       },
       
     components: {
       Dropdown2,
     },
     props: {
       widgetClasses: String,
     },
     totalVuePackages:{
         type: [String, Number, Array]
       },
     methods: {
       setData(res) {
           let loader = this.$loading.show({
            color : '#009ef7',
            height: 40,
            width: 40,
            zIndex: 999,
            blur:'12px',
        });
      this.model = res.data.results;
         this.successful_order = this.model.data.successful_order
         this.total_earning = this.model.data.total_earning
         this.total_orders = this.model.data.total_orders
         this.total_products = this.model.data.total_products
         console.log(this.model.data);
         this.params.per_page = this.model.per_page
         this.params.page = this.model.current_page
     setTimeout(() => {
            loader.hide()
        }, 1000)
           },
       updatePerPage() {
         const query = copyObject(this.$route.query)
         
         query.per_page = this.params.per_page
         query.page = 1
   
         get(`/api/seller/${this.params.id}/?per_page=${this.params.per_page}&q=${this.params.q}`)
         .then(res => {
             this.setData(res)
         })
       },
       nextPage() {
           if(this.model.next_page_url) {
               this.params.page = this.params.page ? this.params.page + 1 : 2
               get(`/api/seller/${this.params.id}/?per_page=${this.params.per_page}&page=${this.params.page}&q=${this.params.q}`)
               .then(res => {
                   this.setData(res)
               })
           }
       },
       prevPage() {
           if(this.model.next_page_url) {
               this.params.page = this.params.page ? Number(this.params.page) - 1 : 1
               get(`/api/seller/${this.params.id}/?per_page=${this.params.per_page}&page=${this.params.page}&q=${this.params.q}`)
               .then(res => {
                   this.setData(res)
               })
           }
       },
       
   },
     setup() {
       const toast = useToast();
       return { toast }
     },
   });
</script>