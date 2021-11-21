<template>
    <div :class="widgetClasses" class="card">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{title}} New Category</span>
            </h3>
        </div>
        <div class="row pr-4 ml-10 px-lg-15 pt-0 pb-15">
            <div class="col-12">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Title</span>
                </label>
                <el-form-item prop="targetTitle">
                    <el-input
                    v-model="form.name"
                    placeholder="Enter Category Title"
                    ></el-input>
                </el-form-item>
                <error-text :error="error.name"></error-text>
            </div>
            <div class="col-8">
                <h3>Customer</h3>
                <p style="margin-bottom: 0px;">{{ model.customer.name }}</p>
                <p style="margin-bottom: 0px;">number</p>
                <p style="margin-bottom: 0px;">address</p>
            </div>
            <div class="col-2">
                <p style="margin-bottom: 0px;">Order #</p>
                <p style="margin-bottom: 0px;">Order status</p>
                <p style="margin-bottom: 0px;">Order date</p>
                <p style="margin-bottom: 0px;">Total amount</p>
                <p style="margin-bottom: 0px;">Payment method</p>
            </div>
            <div class="col-2">
                <p style="margin-bottom: 0px;">{{ model.order_number }}</p>
                <p style="margin-bottom: 0px;">{{ model.delivery_status }}</p>
                <p style="margin-bottom: 0px;">{{ model.created_at  }}</p>
                <p style="margin-bottom: 0px;">{{ model.amount }}</p>
                <p style="margin-bottom: 0px;">{{ model.payment_method }}</p>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted">
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody>
                            <template v-for="(item, index) in model.items" :key="index">
                            <tr>
                                <td class="text-dark fw-bolder text-hover-primary fs-6" v-if="item.product">{{ item.product.name }}</td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6" v-if="item.product" v-html="item.product.description"></td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6">{{ item.qty }}</td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6">{{ item.price }}</td>
                                <td>{{ item.total }}</td>
                                
                            </tr>
                            </template>
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
            model: {
                items: {
                    product:{},
                },
                customer: {},
                product:{},
            }
        }
    },
  beforeRouteUpdate (to, from, next) {
        this.show = false
        get(`/api/order/${to.params.id}`)
            .then(res => {
                this.setData(res)
                next()
            })
            //catch 422
    },
    beforeRouteEnter(to, from, next) {
        get(`/api/order/${to.params.id}`)
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
    setData(res) {
      this.model = res.data.results;
      console.log(this.model.customer)
    },
},
  setup() {
    const toast = useToast();
    return { toast }
  },
});
</script>
