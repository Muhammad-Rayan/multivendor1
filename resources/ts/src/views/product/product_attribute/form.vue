<template>
    <div :class="widgetClasses" class="card">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Add New Attribute</span>
            </h3>
        </div>
        <div class="row pr-4 ml-10 px-lg-15 pt-0 pb-15">
            <div class="col-12">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Attribute Name</span>
                </label>
                <el-form-item prop="targetTitle">
                    <el-input
                    v-model="form.name"
                    placeholder="Enter Attribute Title"
                    ></el-input>
              </el-form-item>
               <error-text :error="error.name"></error-text>
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
        'create': `/api/product/attribute/create`,
        'edit': `/api/product/attribute/${to.params.id}/edit`,
        'clone': `/api/product/attribute/${to.params.id}/edit?mode=clone`,
    }

    return (urls[to.meta.mode] || urls['create'])
}


export default ({
  name: "kt-widget-12",
 components: { Dropdown2,FileUpload,ErrorText },
  mixins: [ form ],
  data() {
        return {
            store: '/api/product/attribute',
            method: 'POST',
            title: 'Create',
            message : 'You have successfully create Attribute!',
            form: {},
        }
    }, 
    
  created() {
      if(this.mode === 'edit') {
          this.store = `/api/product/attribute/${this.$route.params.id}?_method=PUT`
          this.message = 'You have successfully updated Attribute!'
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
           let loader = this.$loading.show({
              color : '#009ef7',
              height: 40,
              width: 40, 
              zIndex: 999,
              blur:'12px',
            });
          this.toast.success(this.message);
          setTimeout(() => {
            loader.hide()
        }, 1000)
          this.$router.push({ name: 'product-attribute' });
        })
    },
    onDocument(e) {
        console.log(e);
        this.form.document = e.target.value;
    },
    setData(res) {
          let loader = this.$loading.show({
            color : '#009ef7',
            height: 40,
            width: 40,
            zIndex: 999,
            blur:'12px',
        });
      this.form = res.data.form;
      setTimeout(() => {
            loader.hide()
        }, 1000)
    }
},
  setup() {
    const toast = useToast();
    return { toast }
  },
});
</script>