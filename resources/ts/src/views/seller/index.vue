<template>
  <!--begin::Tables Widget 13-->
  <div :class="widgetClasses" class="card">
    <!--begin::Header-->
    <div class="row">
      <div class="card-header border-0 pt-5">
        
          <div class="col col-2">
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">All Seller</span>
              </h3>
          </div>
          <div class="col col-8">
            <div class="row">
              <div class="col-6">
              </div>
              <div class="col-3">
                <el-input v-model="params.q" placeholder="Search By Name .."></el-input>
              </div>
              <div class="col-2">
                <a class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" @click="search">
										<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
										<span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"></path>
											</svg>
										</span>
                Filter</a>
              </div>
            </div>

          </div>
        
   
      
      </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
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
              <th>First Name</th>
              <th>Last Name</th>
              <th>Address</th>
              <th>Shop Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <!--end::Table head-->

          <!--begin::Table body-->
          <tbody>
            <template v-for="(item, index) in model.data" :key="index">
              <tr>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                    <p v-if="item.user_info != null">{{ item.user_info.first_name }}</p>
                    <p v-else></p>
                </td>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                  <p v-if="item.user_info != null">{{ item.user_info.last_name }}</p>
                  <p v-else></p>
                </td>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                  <p v-if="item.user_info != null">{{ item.user_info.address }}</p>
                  <p v-else></p>
                </td>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                  <p v-if="item.user_info != null">{{ item.user_info.shopname }}</p>
                  <p v-else></p>
                </td>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                  <p v-if="item.user_info != null">{{ item.user_info.phone }}</p>
                  <p v-else></p>
                </td>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                    {{ item.email }}
                </td>
              
                <td>
                    <a @click="showItems(item.id)" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                   <i class="far fa-eye"></i>
                  </a>
              
                </td>
                 <td>
                    <a v-if="item.is_seller == 2" @click="approveItems(item.id)" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" style="margin-left: -30px;">
                   <i class="fas fa-check-square"></i>
                  </a>
                  <a v-else-if="item.is_seller == 3" @click="approveItems(item.id)" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" style="margin-left: -30px;">
                   <i class="fas fa-check-square"></i>
                  </a>
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
    <!--begin::Body-->
  </div>
  <!--end::Tables Widget 13-->
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
            resource:'/api/seller/',
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
        get(`/api/seller`)
            .then(res => {
                this.setData(res)
                next()
            })
            //catch 422
    },
    beforeRouteEnter(to, from, next) {
        get(`/api/seller`)
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

      get(`/api/seller?per_page=${this.params.per_page}&q=${this.params.q}`)
      .then(res => {
          this.setData(res)
      })
    },
    nextPage() {
        if(this.model.next_page_url) {
            this.params.page = this.params.page ? this.params.page + 1 : 2
            get(`/api/seller?per_page=${this.params.per_page}&page=${this.params.page}&q=${this.params.q}`)
            .then(res => {
                this.setData(res)
            })
        }
    },
    prevPage() {
        if(this.model.next_page_url) {
            this.params.page = this.params.page ? Number(this.params.page) - 1 : 1
            get(`/api/seller?per_page=${this.params.per_page}&page=${this.params.page}&q=${this.params.q}`)
            .then(res => {
                this.setData(res)
            })
        }
    },
    search(){
      get(`/api/seller?per_page=${this.params.per_page}&q=${this.params.q}`)
      .then(res => {
          this.setData(res)
      })
    },
    
   
    showItems(id){
      window.location.href="/admin#/all_sellers/"+id
    },
    approveItems(id){
      get(`/api/seller/approve?id=${id}`)
      .then(res => {
          this.setData(res)
          this.toast.success("Seller Approve Successfully");
      })
    }
},
  setup() {
    const toast = useToast();
    return { toast }
  },
});
</script>
