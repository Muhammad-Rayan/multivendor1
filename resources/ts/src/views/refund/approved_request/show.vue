<template>
    <div :class="widgetClasses" class="card">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Refund</span>
            </h3>
        </div>
        <div class="row pr-4 ml-10 px-lg-15 pt-0 pb-15">
            <div class="col-9"></div>
            
            <div class="col-3">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Refund Status</span>
                  </label>
                  <el-form-item prop="assign">
                    <el-select v-model="model.status" @change="deliveryStatus()">
                    <el-option label="Pending" value="1">Pending</el-option>
                    <el-option label="Confirmed" value="2">Approve</el-option>
                    <el-option label="Picked Up" value="0">Cancel</el-option>
                  </el-select>
                </el-form-item>
            </div>
            <div class="col-3" style="margin-bottom: 22px;">
                <h3>Customer</h3>
                <p style="margin-bottom: 0px;" v-if="model.customer != null">{{ model.customer.name }}</p>
                <p style="margin-bottom: 0px;" v-else>-</p>
                <p style="margin-bottom: 0px;" v-if="model.status == 1">Status : Pending</p>
                <p style="margin-bottom: 0px;" v-if="model.status == 2">Status : Approve</p>
                <p style="margin-bottom: 0px;" v-if="model.status == 3">Status : Cancel</p>
            </div>
            <div class="col-2">
                <p style="margin-bottom: 0px;"><b>Subject : </b></p>
                <p style="margin-bottom: 0px;"><b>Description : </b></p>
            </div>
            <div class="col-2">
                <p style="margin-bottom: 0px;">{{ model.subject }}</p>
                <p style="margin-bottom: 0px;">{{ model.description }}</p>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" style="border-top: 1px solid gray;">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted">
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody>
                            <tr>
                                <td class="text-dark fw-bolder text-hover-primary fs-6" v-if="model.product != null">{{ model.product.name }}</td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6" v-else>-</td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6" v-if="model.product != null" v-html="model.product.description"></td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6" v-else>-</td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6" v-if="model.product != null ">{{ model.product.price }}</td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6" v-else>-</td>
                                
                            </tr>
                        </tbody>
                        <!--end::Table body-->
                        </table>
                </div>
            </div>
            
        </div>
        <!--end::Header-->
    </div>
</template>
<script type="text/javascript">
import Dropdown2 from "@/components/dropdown/Dropdown2.vue";
import FileUpload from '@/my_components/form/FileUpload.vue'
import ErrorText from '@/my_components/form/ErrorText.vue'

import { get,byMethod } from '@/lib/api'
import { form } from '@/lib/mixins'
import { objectToFormData } from '@/lib/helpers'
import { useToast } from "vue-toastification";

function initializeUrl (to) {
    let urls = {
        'create': `/api/product/categories/create`,
        'edit': `/api/product/categories/${to.params.id}/edit`,
        'clone': `/api/product/categories/${to.params.id}/edit?mode=clone`,
    }

    return (urls[to.meta.mode] || urls['create'])
}

export default ({
  name: "kt-widget-12",
  components: { Dropdown2,FileUpload,ErrorText },
  mixins: [ form ],
  data() {
        return {
            testlength:{},
            model: {
                items: {
                    product:{},
                },
                customer: {},
                product:{},
            }
        }
    },
    created() {
          this.store = `/api/refund/${this.$route.params.id}/update`
          this.method = 'POST'
  },
  beforeRouteUpdate (to, from, next) {
        this.show = false
        get(`/api/refund/${to.params.id}`)
            .then(res => {
                this.setData(res)
                next()
            })
            //catch 422
    },
    beforeRouteEnter(to, from, next) {
        get(`/api/refund/${to.params.id}`)
            .then(res => {
                next(vm => vm.setData(res))
            })
            // catch 422
    },
  props: {
    widgetClasses: String,
  },
  totalVuePackages:{
      type: [String, Number, Array]
    },
  methods: {
      deliveryStatus(id){
        byMethod('POST', `/api/refund/${this.model.id}/update`, objectToFormData(this.model))
        .then(res => {
            this.toast.success("Status Change Successfully");
            this.setData(res)
        })
      },
    setData(res) {
      this.model = res.data.results;
      this.testlength = res.data.results.items;
    },
},
  setup() {
    const toast = useToast();
    return { toast }
  },
});
</script>
