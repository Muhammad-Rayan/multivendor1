<template>
<!--begin::Tables Widget 13-->
<div :class="widgetClasses" class="card">
   <!--begin::Header-->
   <div class="card-body p-9">
      <div class="row mb-7">
         <!--begin::Label-->
         <label class="col-lg-4 fw-bold text-muted">Name</label>
         <!--end::Label-->
         <!--begin::Col-->
         <div class="col-lg-8 fv-row">
            <span class="fw-bold text-gray-800 fs-6">{{ product.name }}</span>
         </div>
         <!--end::Col-->
      </div>
      <!--end::Input group-->
      <!--begin::Input group-->
      <div class="row mb-7">
         <!--begin::Label-->
         <label class="col-lg-4 fw-bold text-muted">Description</label>
         <div class="col-lg-8 fv-row">
            <span class="fw-bold text-gray-800 fs-6" v-html="product.description"></span>
         </div>
         <!--end::Col-->
      </div>
   </div>
   <div class="row">
      <div class="card-header border-0 pt-5">
         <div class="col col-2">
            <h3 class="card-title align-items-start flex-column">
               <span class="card-label fw-bolder fs-3 mb-1">All  Product</span>
            </h3>
         </div>
         <div class="col col-8">
            <div class="row">
               <div class="col-6">
               </div>
               <div class="col-3">
               </div>
               <div class="col-2">
                  
               </div>
            </div>
         </div>
         <div class="col col-2">
            <div class="card-toolbar">
               <router-link to="/products/create" class="btn btn-sm btn-light btn-active-primary">
                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                  <span class="svg-icon svg-icon-3">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                     </svg>
                  </span>
                  <!--end::Svg Icon-->New Product
               </router-link>
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
                  <th>ID</th>
                  <th>Size</th>
                  <th>Color</th>
                  <th>Price</th>
                  <th>Stock</th>
               </tr>
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody>
               <template v-for="(item, index) in model" :key="index">
                  <tr>
                     <td class="text-dark fw-bolder text-hover-primary fs-6">
                        {{ item.id }}
                     </td>
                     <td class="text-dark fw-bolder text-hover-primary fs-6" v-if="item.attribute_items != null">
                        {{item.attribute_items.value}}
                     </td>
                     <td class="text-dark fw-bolder text-hover-primary fs-6" v-else>
                        -
                     </td>
                     <td class="text-dark fw-bolder text-hover-primary fs-6" v-if="item.color != null">
                        {{item.color.name}}
                     </td>
                     <td class="text-dark fw-bolder text-hover-primary fs-6" v-else>
                        -
                     </td>
                     <td class="text-dark fw-bolder text-hover-primary fs-6">
                        {{ item.price }}
                     </td>
                     <td class="text-dark fw-bolder text-hover-primary fs-6">
                        {{item.qty}}
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
import { copyObject } from '@/lib/helpers'
import { useToast } from "vue-toastification"

export default ({
  name: "kt-widget-12",
  data() {
        return {
            model: [],
            product:{},
            resource:'/api/product',
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
        get(`/api/product/${to.params.id}`)
            .then(res => {
                this.setData(res)
                next()
            })
            //catch 422
    },
    beforeRouteEnter(to, from, next) {
        get(`/api/product/${to.params.id}`)
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
        }); console.log(res);
       this.model = res.data.results;
      this.attributes = res.data.attribute_items;
      this.colors = res.data.colors
      this.product = res.data.product
      setTimeout(() => {
            loader.hide()
        }, 1000)
    
    },
    
},
  setup() {
    const toast = useToast();
    return { toast }
  },
});
</script>
