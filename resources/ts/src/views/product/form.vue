<template>
    <div class="row">
      <div :class="widgetClasses" class="col-8 card">
          <!--begin::Header-->
          <div class="card-header border-0 pt-5">
              <h3 class="card-title align-items-start flex-column">
                  <span class="card-label fw-bolder fs-3 mb-1">Product Information</span>
              </h3>
          </div>
          <div class="row pr-4 ml-10 px-lg-15 pt-0 pb-15">
              <div class="col-12">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Product Name</span>
                  </label>
                  <el-form-item prop="targetTitle">
                      <el-input
                      v-model="form.name"
                      placeholder="Enter Product Name"
                      ></el-input>
                </el-form-item>
              </div>
              <div class="col-12">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Category</span>
                  </label>
                  <typeahead :initial="form.category" :url="categoryURL" @input="onCategoryUpdate">
                  </typeahead>
              </div>
              <div class="col-12">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Brand</span>
                  </label>
                  <typeahead :initial="form.category" :url="categoryURL" @input="onCategoryUpdate">
                  </typeahead>
              </div>
              <div class="col-12">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Unit</span>
                  </label>
                  <el-form-item prop="targetTitle">
                      <el-input
                      v-model="form.packing"
                      placeholder="Enter Unit"
                      ></el-input>
                </el-form-item>
              </div>
              <div class="col-12">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Minimum Purchase Qty</span>
                  </label>
                  <el-form-item prop="targetTitle">
                      <el-input
                      type="number"
                      v-model="form.minimum_purchase_qty"
                      placeholder="Enter Minimum Purchase Qty"
                      ></el-input>
                </el-form-item>
              </div>
              <div class="col-12">
                   <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                  <span class="required">Tags</span>
                </label>
              <!--end::Label-->

                <el-form-item prop="tags">
                  <el-select
                    v-model="form.tags"
                    multiple
                    filterable
                    allow-create
                    default-first-option
                    placeholder="Choose tags for your target"
                  >
                  </el-select>
                </el-form-item>
              </div>
              <div class="col-6">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Barcode</span>
                  </label>
                  <el-form-item prop="targetTitle">
                      <el-input
                      v-model="form.packing"
                      placeholder="Enter Barcode"
                    ></el-input>
                </el-form-item>
              </div>
              <div class="col-6">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Refundable</span>
                  </label>
                  <input
                  class="form-check-input"
                  type="checkbox"
                  value="1"
                  checked="checked"
                />
              </div>

              <div class="text-end">
                <el-button type="primary" @click="save">
                  Save
                </el-button>
              </div>
          </div>
          <!--end::Header-->
      </div>
      <div class="col-3" style="position: relative;left: 4%;height: 100%;">
        <div class="row">
          <div :class="widgetClasses" class="col-12 card" style="position: relative;left: 4%;height: 100%;margin-bottom: 33px;">
            <div class="card-header border-0 pt-5" style="padding: 0 0.6rem;">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Shipping Configuration</span>
                </h3>
            </div>
            <div class="row pr-4 ml-10 px-lg-6 pt-0 pb-4">
              <div class="col-12 row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2 col-10">
                      <span class="required">Free Shipping</span>
                  </label>
                  <input
                  class="form-check-input col-2"
                  type="checkbox"
                  value="1"
                  checked="checked"
                />
              </div>
              <div class="col-12 row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2 col-10">
                      <span class="required">Flat Rate</span>
                  </label>
                  <input
                  class="form-check-input col-2"
                  type="checkbox"
                  value="1"
                  checked="checked"
                />
              </div>
              <div class="col-12 row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2 col-10">
                      <span class="required">Is Product Quantity Mulitiply</span>
                  </label>
                  <input
                  class="form-check-input col-2"
                  type="checkbox"
                  value="1"
                  checked="checked"
                />
              </div>
            </div>
          </div>
          <div :class="widgetClasses" class="col-12 card" style="position: relative;left: 4%;height: 100%;">
            <div class="card-header border-0 pt-5" style="padding: 0 0.6rem;">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1" style="font-size: 14px !important;">Low Stock Quantity Warning</span>
                </h3>
            </div>
            <div class="row pr-4 ml-10 px-lg-6 pt-0 pb-4">
              <div class="col-12 row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Quantity</span>
                  </label>
                  <el-input
                      v-model="form.packing"
                      placeholder="Enter Quantity"
                      ></el-input>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
</template>
<script type="text/javascript">
import Dropdown2 from "@/components/dropdown/Dropdown2.vue";
import FileUpload from '@/my_components/form/FileUpload.vue'
import Typeahead from '@/my_components/form/Typeahead.vue'

import { get,byMethod } from '@/lib/api'
import { form } from '@/lib/mixins'

export default ({
  name: "kt-widget-12",
  data() {
        return {
            store: '/api/product/categories',
            method: 'POST',
            categoryURL: '/api/product/categories',
        }
    },
    
  components: {
    Dropdown2,FileUpload,Typeahead
  },
  mixins: [ form ],
  props: {
    widgetClasses: String,
  },
  totalVuePackages:{
      type: [String, Number, Array]
    },
  methods: {
    save() {
        this.submitMultipartForm((data) => {
            this.$router.push(`/products/categories`)
        })
    },
    onDocument(e) {
        console.log(e);
        this.form.document = e.target.value;
    },
    setData(res) {
      this.model = res.data;
    },
    onCategoryUpdate(e) {
        const category = e.target.value

        this.form.category_id = category.id;
        this.form.category = category;
    },
},
  setup() {
    
  },
});
</script>
