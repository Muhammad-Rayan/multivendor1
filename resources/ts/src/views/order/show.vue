<template>
    <div :class="widgetClasses" class="card">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Order</span>
            </h3>
        </div>
        <div class="row pr-4 ml-10 px-lg-15 pt-0 pb-15">
            <div class="col-6"></div>
            <div class="col-3">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Payment Status</span>
                  </label>
                  <el-form-item prop="assign">
                    <el-select
                        v-model="model.payment_status" @change="deliveryStatus()"
                    >
                    <el-option label="Unpaid" value="Unpaid"
                      >Unpaid</el-option
                    >
                    <el-option label="Paid" value="Paid"
                      >Paid</el-option
                    >
                  </el-select>
                </el-form-item>
            </div>
            <div class="col-3">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Delivery Status</span>
                  </label>
                  <el-form-item prop="assign">
                    <el-select v-model="model.delivery_status" @change="deliveryStatus()">
                    <el-option label="Pending" value="Pending">Pending</el-option>
                    <el-option label="Confirmed" value="Confirmed">Confirmed</el-option>
                    <el-option label="Picked Up" value="Picked Up">Picked Up</el-option>
                    <el-option label="On The Way" value="On The Way">On The Way</el-option>
                    <el-option label="Delivered" value="Delivered">Delivered</el-option>
                  </el-select>
                </el-form-item>
            </div>
            <div class="col-8" style="margin-bottom: 22px;">
                <h3>Customer</h3>
                <p style="margin-bottom: 0px;" v-if="model.customer != null">{{ model.customer.name }}</p>
                <p style="margin-bottom: 0px;" v-else></p>
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
                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" style="border-top: 1px solid gray;">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted">
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Shipping</th>
                            <th>Price</th>
                            <th>Total</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody style="border-bottom: 1px solid #a1a5b7;">
                            <template v-for="(item, index) in model.items" :key="index">
                            <tr>
                                <td class="text-dark fw-bolder text-hover-primary fs-6" v-if="item.product != null">{{ item.product.name }}</td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6" v-else>-</td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6">{{ item.qty }}</td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6" v-if="item.product != null && item.product.shipping_costrate != null">{{ item.product.shipping_costrate }}</td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6" v-else>0</td>
                                <td class="text-dark fw-bolder text-hover-primary fs-6">{{ item.price }}</td>
                                <td>{{ item.price }}</td>
                                
                            </tr>
                            </template>
                        </tbody>
                        <!--end::Table body-->
                        </table>
                </div>
            </div>
            <div class="col-8">
            </div>
            <div class="col-2">
                <p><b>Sub Total :</b></p>
                <!-- <p><b>Shipping :</b></p> -->
                <p><b>Total :</b></p>
            </div>
            <div class="col-2">
                <p>{{ totalItem }}</p>
                <!-- <p>{{ totalShipping }}</p> -->
                <p>{{ model.amount }}</p>
            </div>
            
        </div>
        <!--end::Header-->
    </div>
</template>
<script type="text/javascript">
import Dropdown2 from "@/components/dropdown/Dropdown2.vue";
import FileUpload from '@/my_components/form/FileUpload.vue'
import ErrorText from '@/my_components/form/ErrorText.vue'
import { objectToFormData } from '@/lib/helpers'

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
          this.store = `/api/order/${this.$route.params.id}/update`
          this.method = 'POST'
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
    computed: {
        totalItem(){
            let sum = 0;
            for(let i = 0; i < this.testlength.length; i++){
                sum += (parseFloat(this.testlength[i].price) * parseFloat(this.testlength[i].qty));
            }
            return sum;
        },
        // totalShipping(){
        //     let sum = 0;
        //     for(let i = 0; i < this.testlength.length; i++){
        //         console.log(this.testlength);
        //         sum += (parseFloat(this.testlength[i].shipping_costrate));
        //     }
        //     return sum;
        // },
        totalTax(){
            let sum = 0;
            for(let i = 0; i < this.testlength.length; i++){
                sum += (parseFloat(this.testlength[i].tax));
            }
            return sum;
        }
    },
  props: {
    widgetClasses: String,
  },
  totalVuePackages:{
      type: [String, Number, Array]
    },
  methods: {
      deliveryStatus(id){
          byMethod('POST', `/api/order/${this.model.id}/update`, objectToFormData(this.model))
            .then(res => {
                this.toast.success("Status Change Successfully");
                this.setData(res)
            })
        // byMethod('POST', `/api/order/${this.model.id}/update`,this.model)
        // .then(({data}) => {
        //     this.toast.success("Order Deliver Successfully");
        //     get(`/api/order`)
        //     .then(res => {
        //         this.setData(res)
        //     })
        // })
        // .catch((err) => {})
      },
    setData(res) {
          let loader = this.$loading.show({
            color : '#009ef7',
            height: 40,
            width: 40,
            zIndex: 999,
            blur:'12px',
        });
      this.model = res.data.results;
      this.testlength = res.data.results.items;
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
