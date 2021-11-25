<template>
    <div :class="widgetClasses" class="card">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Account Setting</span>
            </h3>
        </div>
             <div class="row pr-4 ml-10 px-lg-15 pt-0 pb-15">
    
          
            <div class="col-12">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">User Name</span>
                </label>
                <el-form-item prop="targetTitle">
                    <el-input
                    v-model="form.name"
                    placeholder="Enter new  UserName"
                    ></el-input>
              </el-form-item>
               <error-text :error="error.name"></error-text>
           
            </div>
            <div class="col-12">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Email</span>
                </label>
                <el-form-item prop="targetTitle">
                    <el-input
                    v-model="form.email"
                    placeholder="Enter new Email"
                    ></el-input>
              </el-form-item>
               <error-text :error="error.email"></error-text>
            </div>
        
       
          
            <div class="col-12">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">New Password</span>
                </label>
                <el-form-item prop="targetTitle">
                    <el-input
                    v-model="form.password"
                    placeholder="Enter New Password"
                    ></el-input>
              </el-form-item>
               <error-text :error="error.password"></error-text>
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
        'create': `/api/account/create`,
        'edit': `/api/account/${to.params.id}/edit`,
        'clone': `/api/account/${to.params.id}/edit?mode=clone`,
    }

    return (urls[to.meta.mode] || urls['create'])
}


export default ({
  name: "kt-widget-12",
 components: { Dropdown2,FileUpload,ErrorText },
  mixins: [ form ],
  data() {
        return {
            store: '/api/account/store',
            method: 'POST',
            title: 'Create',
            message : 'You have successfully create Attribute!',
            form: {},
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
          this.$router.push({ name: 'Dashboard' });
        })
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