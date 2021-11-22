<template>
  <!--begin::Tables Widget 13-->
  <div :class="widgetClasses" class="card">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bolder fs-3 mb-1">Category</span>
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
        <!--end::Svg Icon-->New Category</router-link>
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
                  <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                   <i class="far fa-edit"></i>


                  </a>
                  <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                <i class="far fa-trash-alt"></i>
                  </a>
                </td>
                
              </tr>
            </template>
          </tbody>
          <!--end::Table body-->
        </table>
        <!--end::Table-->
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

export default ({
  name: "kt-widget-12",
  data() {
        return {
            model: [],
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
      this.model = res.data;
    }
},
  setup() {

  },
});
</script>
