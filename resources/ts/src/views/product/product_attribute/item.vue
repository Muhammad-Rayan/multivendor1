<template>
    <div :class="widgetClasses" class="card">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Add New Attribute Items</span>
            </h3>
        </div>
        
            <div class="row pr-4 ml-10 px-lg-15 pt-0 pb-15" >
                    <div class="col-12">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Name</span>
                        </label>
                        <el-form-item prop="targetTitle">
                            <el-input
                            v-model="form.value"
                            placeholder="Enter Attribute Title"
                            ></el-input>
                        </el-form-item>
                        <error-text :error="error.value"></error-text>
                    </div>
            
                <div class="text-end">
                    <el-button type="primary" @click="save">
                        Add
                    </el-button>
                </div>
                <table
          class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3"
        >
          <!--begin::Table head-->
          <thead>
            <tr class="fw-bolder text-muted">
              <th>ID</th>
              <th>Name</th>
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
                <td class="text-dark fw-bolder text-hover-primary fs-6">
                    {{ item.value }}
                </td>
                
                
              </tr>
            </template>
          </tbody>
          <!--end::Table body-->
        </table>
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
import { objectToFormData } from '@/lib/helpers';

function initializeUrl (to) {
    let urls = {
        'create': `/api/product/attributeitem/${to.params.id}/edit`,
        'edit': `/api/product/attributeitem/${to.params.id}/edit`,
        'clone': `/api/product/attributeitem/${to.params.id}/edit?mode=clone`,
    }

    return (urls[to.meta.mode] || urls['create'])
}


export default ({
  name: "kt-widget-12",
 components: { Dropdown2,FileUpload,ErrorText },
  mixins: [ form ],
  data() {
        return {
            store: '/api/product/attributeitem',
            method: 'POST',
            title: 'Create',
            message : 'You have successfully create Attribute Items!',
            form: {},
            model:{},
        }
    }, 
    
  created() {
      
          this.store = `/api/product/attributeitem/${this.$route.params.id}?_method=PUT`
          this.message = 'You have successfully updated Attribute Items!'
          this.method = 'POST'
          this.title = 'Edit'
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
        byMethod(this.method, this.store, objectToFormData(this.form))
            .then(res => {
                      let loader = this.$loading.show({
              color : '#009ef7',
              height: 40,
              width: 40, 
              zIndex: 999,
              blur:'12px',
            });
            this.setData(res)
            setTimeout(() => {
                loader.hide()
            }, 1000)
        })
    //   this.submitMultipartForm(this.form,(data) => { 
    //        let loader = this.$loading.show({
    //           color : '#009ef7',
    //           height: 40,
    //           width: 40, 
    //           zIndex: 999,
    //           blur:'12px',
    //         });
    //         console.log(data);
    //       this.toast.success(this.message);
    //       setTimeout(() => {
    //         loader.hide()
    //     }, 1000)
    //       this.$router.push({ name: 'product-attribute' });
    //     })
    },
    onDocument(e) {
        console.log(e);
        this.form.document = e.target.value;
    },
    setData(res) {
        console.log(res);
          let loader = this.$loading.show({
            color : '#009ef7',
            height: 40,
            width: 40,
            zIndex: 999,
            blur:'12px',
        });
      this.model = res.data.results;
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