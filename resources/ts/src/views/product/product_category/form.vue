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
            <div class="col-6">
                  <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                      <span class="required">Type</span>
                  </label>
                  <el-form-item prop="assign">
                    <el-select
                        v-model="form.type"
                    >
                    <el-option label="Physical" value="Physical"
                      >Physical</el-option
                    >
                    <el-option label="Digital" value="Digital"
                      >Digital</el-option
                    >
                  </el-select>
                  <error-text :error="error.type"></error-text>
                </el-form-item>
            </div>
            <div class="col-6">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Image</span>
                </label>
                <input type="file" class="form-control" @change="onThumbnailChange">
            </div>
            <div class="col-12">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Meta Title</span>
                </label>
                <el-form-item prop="targetTitle">
                    <el-input
                    v-model="form.meta_title"
                    placeholder="Enter Meta Title"
                    ></el-input>
                </el-form-item>
                <error-text :error="error.meta_title"></error-text>
            </div>
            <div class="col-12">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Meta Description</span>
                </label>
                <el-form-item prop="targetTitle">
                    <el-input
                    type="textarea"
                    rows="3"
                    v-model="form.meta_description"
                    placeholder="Enter Meta Description"
                    ></el-input>
                </el-form-item>
                <error-text :error="error.meta_description"></error-text>
            </div>
            <div class="text-end">
              <el-button type="primary" @click="save">
                Save
              </el-button>
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
            store: '/api/product/categories',
            method: 'POST',
            title: 'Create',
            message : 'You have successfully create category!',
            form: {},
        }
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
    save() {
      this.submitMultipartForm(this.form,(data) => {
          this.$Progress.start();
          this.toast.success(this.message);
          this.$router.push({ name: 'product-category-list' });
        })
    },
    onThumbnailChange(e){
        this.form.image = e.target.files[0];
    },
    onDocument(e) {
        console.log(e);
        this.form.document = e.target.value;
    },
    setData(res) {
      this.form = res.data.form;
    }
},
  setup() {
    const toast = useToast();
    return { toast }
  },
});
</script>
