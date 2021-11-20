<template>
  <!--begin::Tables Widget 13-->
  <div :class="widgetClasses" class="card">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bolder fs-3 mb-1"><slot name="title"></slot></span>
      </h3>
      <div class="card-toolbar">
        <router-link to="/products/create" class="btn btn-sm btn-light btn-active-primary">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
        <span class="svg-icon svg-icon-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
          </svg>
        </span>
        <!--end::Svg Icon--><slot name="add_button"></slot></router-link>
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
              <th v-for="item in heading">
                  {{ item.title }}
              </th>
            </tr>
          </thead>
          <!--end::Table head-->

          <!--begin::Table body-->
            <tbody v-if="model.data && model.data.length">
                <slot v-for="item in model.data" :item="item"></slot>
            </tbody>
            <tbody v-else>
                <tr>
                    <th :colspan="8" class="panel-no_results">Not Results found!</th>
                </tr>
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

export default ({
  name: "kt-widget-12",
  props: {
    resource: {
        required: true,
        type: String
    },
    heading: {
        required: true,
        type: Array
    },
  },
  data() {
        return {
            model: [],
            // resource:'/api/product',
            params: {
              per_page: 12,
              page: 1,
              q: this.$route.query.q || '',
              sort_column: this.$route.query.sort_column|| this.defaultSortColumn,
              sort_direction: this.$route.query.sort_direction || this.defaultSortDirection
            },
        }
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
      this.$data.model = res.data.results;
      this.params.per_page = this.model.per_page
      this.params.page = this.model.current_page
    },
    updatePerPage() {
      const query = copyObject(this.$route.query)
      
      query.per_page = this.params.per_page
      query.page = 1

      get(`${this.resource}?per_page=`+this.params.per_page)
      .then(res => {
          this.setData(res)
      })
    },
    nextPage() {
        if(this.model.next_page_url) {
            this.params.page = this.params.page ? this.params.page + 1 : 2
            get(`${this.resource}?per_page=${this.params.per_page}&page=${this.params.page}`)
            .then(res => {
                this.setData(res)
            })
        }
    },
    prevPage() {
        if(this.model.next_page_url) {
            this.params.page = this.params.page ? Number(this.params.page) - 1 : 1
            get(`${this.resource}?per_page=${this.params.per_page}&page=${this.params.page}`)
            .then(res => {
                this.setData(res)
            })
        }
    },
},
  setup() {

  },
});
</script>
