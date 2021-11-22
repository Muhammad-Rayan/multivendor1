<template>
  <!--begin::Tables Widget 13-->
  <div :class="widgetClasses" class="card">
    <!--begin::Header-->
    <div class="row">
      <div class="card-header border-0 pt-5">
        
          <div class="col col-4">
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Approved Refund</span>
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
              <th>Customer Name</th>
              <th>Product Name</th>
              <th>Order Number</th>
              <th>Subject</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <!--end::Table head-->

          <!--begin::Table body-->
          <tbody>
            <template v-for="(item, index) in model.data" :key="index">
              <tr>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                    {{ item.customer.name }}
                </td>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                    {{ item.product.name }}
                </td>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                    {{ item.order_number }}
                </td>
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                    {{ item.subject }}
                </td>
                <td>
                  <span class="badge badge-light-primary" v-if="item.status == 2">Approved</span>
                </td>
                <td>
                    <a @click="showItems(item.id)" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                    <span class="svg-icon svg-icon-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                      </svg>
                    </span>
                    <!--end::Svg Icon-->
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
            resource:'/api/refund?status=2',
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
        get(`/api/refund?status=2`)
            .then(res => {
                this.setData(res)
                next()
            })
            //catch 422
    },
    beforeRouteEnter(to, from, next) {
        get(`/api/refund?status=2`)
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

      get(`/api/refund?status=2&per_page=${this.params.per_page}&q=${this.params.q}`)
      .then(res => {
          this.setData(res)
      })
    },
    nextPage() {
        if(this.model.next_page_url) {
            this.params.page = this.params.page ? this.params.page + 1 : 2
            get(`/api/refund?status=2&per_page=${this.params.per_page}&page=${this.params.page}&q=${this.params.q}`)
            .then(res => {
                this.setData(res)
            })
        }
    },
    prevPage() {
        if(this.model.next_page_url) {
            this.params.page = this.params.page ? Number(this.params.page) - 1 : 1
            get(`/api/refund?status=2&per_page=${this.params.per_page}&page=${this.params.page}&q=${this.params.q}`)
            .then(res => {
                this.setData(res)
            })
        }
    },
    search(){
      get(`/api/refund?status=2&per_page=${this.params.per_page}&q=${this.params.q}`)
      .then(res => {
          this.setData(res)
      })
    },
    deleteItems(id) {
        byMethod('POST', `/api/refund/${id}/delete`)
        .then(({data}) => {
            this.toast.success("Refund Delete Successfully");
            get(`/api/refund?status=2`)
            .then(res => {
                this.setData(res)
            })
        })
        .catch((err) => {})
    },
    showItems(id){
      window.location.href="/admin#/refund/"+id
    },
},
  setup() {
    const toast = useToast();
    return { toast }
  },
});
</script>
