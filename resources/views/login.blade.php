<template>
  <!--begin::Tables Widget 13-->
  <div :class="widgetClasses" class="card">
    <!--begin::Header-->
    <div class="row">
      <div class="card-header border-0 pt-5">
        
          <div class="col col-2">
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Category</span>
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
        
        <div class="col col-2">
          <div class="card-toolbar">
            <router-link to="/products/categories/create" class="btn btn-sm btn-light btn-active-primary">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
              </svg>
            </span>
            <!--end::Svg Icon-->New Category</router-link>
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
        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
          <!--begin::Table head-->
          <thead>
          <tr class="fw-bolder text-muted">
              <th>ID</th>
              <th>Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <!--end::Table head-->

          <!--begin::Table body-->
          <tbody>
         <template v-for="(item, index) in model.results" :key="index">
           
              <tr>
              <td class="text-dark fw-bolder text-hover-primary fs-6">
              <td class="text-dark fw-bolder text-hover-primary fs-6">
                    {{ item.id }}
                </td>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                    {{ item.name }}
                </td>
                <td v-if="item.active == 1">
                  <span class="badge badge-light-primary">Active</span>
                </td>
                <td v-else>
                  <span class="badge badge-light-danger">In Active</span>
                </td>
                
               
                <td>
                  <a @click="editItems(item.id)" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                   <i class="far fa-edit"></i>


                  </a>
                  <a @click="deleteItems(item.id)" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                <i class="far fa-trash-alt"></i>
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
            resource:'/api/product/categories',
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
        get(`/api/product/categories`)
            .then(res => {
                this.setData(res)
                next()
            })
            //catch 422
    },
    beforeRouteEnter(to, from, next) {
        get(`/api/product/categories`)
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
      this.model = res.data.results;
      this.params.per_page = this.model.per_page
      this.params.page = this.model.current_page
    },
   
    updatePerPage() {
      const query = copyObject(this.$route.query)
      
      query.per_page = this.params.per_page
      query.page = 1

      get(`/api/product/categories?per_page=${this.params.per_page}&q=${this.params.q}`)
      .then(res => {
          this.setData(res)
      })
    },
    nextPage() {
        if(this.model.next_page_url) {
            this.params.page = this.params.page ? this.params.page + 1 : 2
            get(`/api/product/categories?per_page=${this.params.per_page}&page=${this.params.page}&q=${this.params.q}`)
            .then(res => {
                this.setData(res)
            })
        }
    },
    prevPage() {
        if(this.model.next_page_url) {
            this.params.page = this.params.page ? Number(this.params.page) - 1 : 1
            get(`/api/product/categories?per_page=${this.params.per_page}&page=${this.params.page}&q=${this.params.q}`)
            .then(res => {
                this.setData(res)
            })
        }
    },
    search(){
      get(`/api/product/categories?per_page=${this.params.per_page}&q=${this.params.q}`)
      .then(res => {
          this.setData(res)
      })
    },
    deleteItems(id) {
        byMethod('POST', `/api/product/categories/${id}/delete`)
        .then(({data}) => {
            this.toast.success("Product Delete Successfully");
            get(`/api/product/categories`)
            .then(res => {
                this.setData(res)
            })
        })
        .catch((err) => {})
    },
    editItems(id){
      window.location.href="/admin#/products/categories/"+id+"/edit/"
    },
},
  setup() {
    const toast = useToast();
    return { toast }
  },
});
</script>
