<template>
    <div class="row">
      <div class="col-8">
          <div :class="widgetClasses" class="card" style="margin-bottom: 28px;">
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
                <div class="col-2">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Refundable</span>
                    </label>
                    <label class="form-check form-switch form-check-custom form-check-solid">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      v-bind:true-value="1"
                      v-bind:false-value="0"
                      v-model="form.refund"
                    />
                  </label>
                </div>
                <div class="col-4">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Product Variation</span>
                    </label>
                    <label class="form-check form-switch form-check-custom form-check-solid">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      v-bind:true-value="1"
                      v-bind:false-value="0"
                      v-model="form.product_variation"
                    />
                  </label>
                </div>
            </div>
          </div>

        <div :class="widgetClasses" class="card" style="margin-bottom: 28px;">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Product Information</span>
                </h3>
            </div>
            <div class="row pr-4 ml-10 px-lg-15 pt-0 pb-15">
                <div class="col-12">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Gallery Images</span>
                  </label>
                  <file-upload @ready="onDocument"></file-upload>
                  <error-text :error="error.image"></error-text>
                </div>
                <div class="col-12">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Thumbnail Image</span>
                  </label>
                  <file-upload @ready="onDocument"></file-upload>
                  <error-text :error="error.image"></error-text>
                </div>
            </div>
            <!--end::Header-->
            
        </div>


        <div :class="widgetClasses" class="card" style="margin-bottom: 28px;">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Product Videos</span>
                </h3>
            </div>
            <div class="row pr-4 ml-10 px-lg-15 pt-0 pb-15">
                <div class="col-12">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Video Url</span>
                  </label>
                  <el-form-item prop="targetTitle">
                        <el-input
                        v-model="form.packing"
                        placeholder="Enter Unit"
                        ></el-input>
                  </el-form-item>
                </div>
            </div>
            <!--end::Header-->
            
        </div>

        <div :class="widgetClasses" class="card" style="margin-bottom: 56px;height: 17%;">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Product Description</span>
                </h3>
            </div>
            <div class="row pr-4 ml-10 px-lg-15 pt-0 pb-15">
                <div class="col-12">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Description</span>
                  </label>
                    <QuillEditor theme="snow" @input="onEditorChange($event)" />
                </div>
            </div>
        </div>
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
              <div class="col-12 row" style="margin-bottom: 10px;">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2 col-10">
                      <span class="required">Free Shipping</span>
                  </label>
                  <label class="form-check form-switch form-check-custom form-check-solid col-2">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      v-bind:true-value="1"
                      v-bind:false-value="0"
                      v-model="form.free_shipping"
                    />
                  </label>
              </div>
              <div class="col-12 row" style="margin-bottom: 10px;">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2 col-10">
                      <span class="required">Flat Rate</span>
                  </label>
                  <label class="form-check form-switch form-check-custom form-check-solid col-2" style="margin-bottom: 10px;">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      v-bind:true-value="1"
                      v-bind:false-value="0"
                      v-model="form.shipping_flatrate"
                    />
                  </label>
                  <el-input
                      v-model="form.shipping_costrate"
                      placeholder="Enter Quantity"
                      ></el-input>
              </div>
              <div class="col-12 row" style="margin-bottom: 10px;">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2 col-10">
                      <span class="required">Is Product Quantity Mulitiply</span>
                  </label>
                  <label class="form-check form-switch form-check-custom form-check-solid col-2">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      v-bind:true-value="1"
                      v-bind:false-value="0"
                      v-model="form.shipping_productmultiply"
                    />
                  </label>
                  
              </div>
            </div>
          </div>
          <div :class="widgetClasses" class="col-12 card" style="position: relative;left: 4%;height: 100%;margin-bottom: 33px;">
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
          <div :class="widgetClasses" class="col-12 card" style="position: relative;left: 4%;height: 100%;margin-bottom: 33px;">
            <div class="card-header border-0 pt-5" style="padding: 0 0.6rem;">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1" style="font-size: 14px !important;">Cash on Delivery</span>
                </h3>
            </div>
            <div class="row pr-4 ml-10 px-lg-6 pt-0 pb-4">
              <div class="col-12 row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2 col-10">
                      <span class="required">Status</span>
                  </label>
                  <label class="form-check form-switch form-check-custom form-check-solid col-2" style="margin-bottom: 10px;">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      v-bind:true-value="1"
                      v-bind:false-value="0"
                      v-model="form.cashondelivery"
                    />
                  </label>
              </div>
            </div>
          </div>
          <div :class="widgetClasses" class="col-12 card" style="position: relative;left: 4%;height: 100%;margin-bottom: 33px;">
            <div class="card-header border-0 pt-5" style="padding: 0 0.6rem;">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1" style="font-size: 14px !important;">Featured</span>
                </h3>
            </div>
            <div class="row pr-4 ml-10 px-lg-6 pt-0 pb-4">
              <div class="col-12 row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2 col-10">
                      <span class="required">Status</span>
                  </label>
                  <label class="form-check form-switch form-check-custom form-check-solid col-2" style="margin-bottom: 10px;">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      v-bind:true-value="1"
                      v-bind:false-value="0"
                      v-model="form.featured"
                    />
                  </label>
              </div>
            </div>
          </div>
          <div :class="widgetClasses" class="col-12 card" style="position: relative;left: 4%;height: 100%;margin-bottom: 33px;">
            <div class="card-header border-0 pt-5" style="padding: 0 0.6rem;">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1" style="font-size: 14px !important;">Estimate Shipping Time</span>
                </h3>
            </div>
            <div class="row pr-4 ml-10 px-lg-6 pt-0 pb-4">
              <div class="col-12 row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Shipping Days</span>
                  </label>
                  <el-input
                      v-model="form.packing"
                      placeholder="Shipping Days"
                      ></el-input>
              </div>
            </div>
          </div>
          <div :class="widgetClasses" class="col-12 card" style="position: relative;left: 4%;height: 100%;margin-bottom: 33px;">
            <div class="card-header border-0 pt-5" style="padding: 0 0.6rem;">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1" style="font-size: 14px !important;">Vat & TAX</span>
                </h3>
            </div>
            <div class="row pr-4 ml-10 px-lg-6 pt-0 pb-4">
              <div class="col-12 row">
                  <el-form-item prop="assign">
                    <el-select v-model="form.type">
                    <el-option label="Flat" value="Flat">Flat</el-option>
                    <el-option label="Precent" value="Precent">Precent</el-option>
                    </el-select>
                    <error-text :error="error.type"></error-text>
                  </el-form-item>
              </div>
              <div class="col-12 row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Vat</span>
                  </label>
                  <el-input
                  type="number"
                      v-model="form.packing"
                      placeholder="Vat"
                      ></el-input>
              </div>
              
            </div>
          </div>
          <div :class="widgetClasses" class="col-12 card" style="position: relative;left: 4%;height: 100%;margin-bottom: 33px;">
            <div class="card-header border-0 pt-5" style="padding: 0 0.6rem;">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1" style="font-size: 14px !important;">Product Price</span>
                </h3>
            </div>
            <div class="row pr-4 ml-10 px-lg-6 pt-0 pb-4">
              <div class="col-12 row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Price</span>
                  </label>
                  <el-input
                  type="number"
                      v-model="form.price"
                      ></el-input>
              </div>
              <div class="col-12 row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Discount</span>
                  </label>
                  <el-input
                  type="number"
                      v-model="form.discount"
                      ></el-input>
              </div>
              <div class="col-12 row">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Qty</span>
                  </label>
                  <el-input
                  type="number"
                      v-model="form.qty"
                      ></el-input>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-12">
        <div :class="widgetClasses" class="card" style="margin-bottom: 28px;">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Product Variation</span>
                </h3>
            </div>
            <div class="row pr-4 ml-10 px-lg-5 pt-0 pb-5">
              <template v-for="(item, index) in form.items">
                  <div class="col-2">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Colors</span>
                    </label>
                      <typeahead :initial="item.category" :url="categoryURL" @input="onCategoryUpdate">
                      </typeahead>
                  </div>
                  <div class="col-2">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Attributes</span>
                    </label>
                      <typeahead :initial="item.category" :url="categoryURL" @input="onCategoryUpdate">
                      </typeahead>
                  </div>
                  <div class="col-2">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Attributes Items</span>
                    </label>
                      <typeahead :initial="item.category" :url="categoryURL" @input="onCategoryUpdate">
                      </typeahead>
                  </div>
                  <div class="col-1">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Price</span>
                    </label>
                      <el-form-item prop="targetTitle">
                          <el-input
                          v-model="item.price"
                          ></el-input>
                      </el-form-item>
                  </div>
                  <div class="col-1">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Discount</span>
                    </label>
                      <el-form-item prop="targetTitle">
                          <el-input
                          v-model="item.name"
                          ></el-input>
                      </el-form-item>
                  </div>
                  <div class="col-1">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Qty</span>
                    </label>
                      <el-form-item prop="targetTitle">
                          <el-input
                          v-model="item.name"
                          ></el-input>
                      </el-form-item>
                  </div>
                  <div class="col-2">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Image</span>
                    </label>
                      <file-upload @ready="onDocument"></file-upload>
                      <error-text :error="error.image"></error-text>
                  </div>
                  <div class="col-1">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span></span>
                    </label>
                    <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" @click="removeProduct(item, index)" style="margin-top: 23px;">
                      <i class="fa fa-trash"></i>
                    </a>
                  </div>
              </template>
                <div class="col-1">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span></span>
                    </label>
                    <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" @click="addNewLine">
                      <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-12">
          <div :class="widgetClasses" class="card" style="margin-bottom: 28px;">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">SEO Meta Tags</span>
                </h3>
            </div>
            <div class="row pr-4 ml-10 px-lg-15 pt-0 pb-15">
                <div class="col-6">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Meta Title</span>
                  </label>
                      <el-form-item prop="targetTitle">
                          <el-input
                          v-model="form.price"
                          ></el-input>
                      </el-form-item>
                </div>
                <div class="col-6">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Meta Image</span>
                  </label>
                    <file-upload @ready="onDocument"></file-upload>
                    <error-text :error="error.image"></error-text>
                </div>
                <div class="col-12">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Description</span>
                  </label>
                    <QuillEditor theme="snow" @input="onMetaDescription($event)" />
                </div>
                <div class="col-12" style="margin-top: 10%;">
                  <div class="text-end">
                    <el-button type="primary" @click="save">
                      Save
                    </el-button>
                  </div>  
                </div>
            </div>
            <!--end::Header-->
            
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

function initializeUrl (to) {
    let urls = {
        'create': `/api/product/create`,
        'edit': `/api/product/${to.params.id}/edit`,
        'clone': `/api/product/${to.params.id}/edit?mode=clone`,
    }

    return (urls[to.meta.mode] || urls['create'])
}

export default ({
  
  mixins: [ form ],
  name: "kt-widget-12",
  data() {
        return {
            store: '/api/product',
            method: 'POST',
            categoryURL: '/api/product/categories',
        }
    },
    
  components: {
    Dropdown2,FileUpload,Typeahead
  },
  created() {
      if(this.mode === 'edit') {
          this.store = `/api/product/categories/${this.$route.params.id}?_method=PUT`
          this.message = 'You have successfully updated category!'
          this.method = 'POST'
          this.title = 'Edit'
      }
  },
  beforeRouteEnter(to, from, next) {
      get(initializeUrl(to))
          .then(res => {
              next(vm => vm.setData(res))
          })
          // catch 422
  },
  beforeRouteUpdate (to, from, next) {
      this.show = false

      get(initializeUrl(to))
          .then(res => {
              this.setData(res)
              next()
          })
          //catch 422
  },
  props: {
    widgetClasses: String,
  },
  totalVuePackages:{
      type: [String, Number, Array]
    },
  methods: {
    addNewLine() {
        this.form.items.push({
            'price': 0,
            'qty': 1
        })
    },
    removeProduct(item, index) {
        if(this.form.items.length > 1) {
            this.form.items.splice(index, 1)
        }
    },
    onEditorChange(e) {
      this.form.description = e.target.innerHTML;
    },
    onMetaDescription(e){
      this.form.meta_description = e.target.innerHTML;
    },
    save() {
        this.submitMultipartForm((data) => {
            this.$router.push(`/products/categories`)
        })
    },
    val() {
        this.form.description = "This's new value";
    },
    onChange(html, text) {
        console.log(html.length, text.length);
    },
    onDocument(e) {
        console.log(e);
        this.form.document = e.target.value;
    },
    setData(res) {
      this.form = res.data.form;
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
<style>
.typeahead-selected{
  font-size: 9px;
}
</style>
