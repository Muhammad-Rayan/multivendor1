<template>
    <div :class="widgetClasses" class="card">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Support</span>
            </h3>
        </div>
        <div class="row pr-4 ml-10 px-lg-15 pt-0 pb-15">
            <div class="col-12" style="margin-bottom: 87px;">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Description</span>
                </label>
                <QuillEditor theme="snow" @input="onDescription($event)" />
                <error-text :error="error.description"></error-text>
            </div>
            <div class="col-12">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Image</span>
                  </label>
                  <input type="file" class="form-control" @change="onSupportChange">
            </div>
            <div class="col-8">
                <el-form-item prop="assign">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Select as</span>
                    </label>
                    <el-select v-model="form.status">
                        <el-option label="Pending" value="Pending">Pending</el-option>
                        <el-option label="Open" value="Open">Open</el-option>
                        <el-option label="Solved" value="Solved">Solved</el-option>
                    </el-select>
                    <error-text :error="error.status"></error-text>
                  </el-form-item>
            </div>
            <div class="col-4">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span></span>
                    </label>
                <div class="text-end">
                    <el-button type="primary" @click="save" style="margin-top: 12%;">
                        Submit
                    </el-button>
                </div> 
            </div>
            
            <div class="col-12">
                <div class="card-body border-top">
                        <div class="row">
                            <div class="col-12">
                                <h5 style="color:red;text-align: center;">{{ model.subject }}</h5>
                            </div> 
                        </div>
                        <div class="separator separator-dashed my-6"></div>
                        <template v-for="(item, index) in model.items" :key="index">
                            <div class="row">
                                
                                <div class="col-10"> 
                                    <div id="kt_signin_email">
                                        <div class="fs-6 fw-bolder mb-1" v-if="model.customer">{{ model.customer.name }}</div>
                                        <div class="fw-bold text-gray-600" v-if="model.customer">{{ model.customer.email }}</div>
                                        <div class="fs-6 fw-bolder mb-1">{{ item.description }}</div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div id="kt_signin_email_button" class="ms-auto">
                                        {{ item.date }}
                                    </div>
                                </div>
                            </div>
                        </template>

                    <div class="separator separator-dashed my-6"></div>
                    
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
          this.store = `/api/support/${this.$route.params.id}/update`
          this.method = 'POST'
  },
  beforeRouteUpdate (to, from, next) {
        this.show = false
        get(`/api/support/${to.params.id}`)
            .then(res => {
                this.setData(res)
                next()
            })
            //catch 422
    },
    beforeRouteEnter(to, from, next) {
        get(`/api/support/${to.params.id}`)
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
    save() {
        this.submitMultipartForm(this.form,(data) => {
            this.$Progress.start();
            this.toast.success(this.message);
            this.$router.push({ name: 'product-list' });
        })
    },
    onSupportChange(e){
        this.form.image = e.target.files[0];
    },
    onMetaDescription(e){
      this.form.description = e.target.innerHTML;
    },
    setData(res) {
      this.model = res.data.results;
    },
},
  setup() {
    const toast = useToast();
    return { toast }
  },
});
</script>
