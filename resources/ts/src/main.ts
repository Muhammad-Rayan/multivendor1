import { createApp } from "vue";
import App from "./App.vue";

/*
TIP: To get started with clean router change path to @/router/clean.ts.
 */
import router from "./router";
import store from "./store";
import ElementPlus from "element-plus";
import i18n from "@/core/plugins/i18n";

import VueLoading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

//imports for app initialization
// import MockAdapter from "@/core/mock/MockService";
import ApiService from "@/core/services/ApiService";
import { initApexCharts } from "@/core/plugins/apexcharts";
import { initInlineSvg } from "@/core/plugins/inline-svg";
import { initVeeValidate } from "@/core/plugins/vee-validate";
import VueProgressBar from "@aacassandra/vue3-progressbar";
import Toast, { PluginOptions } from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

import "@/core/plugins/keenthemes";
import "@/core/plugins/prismjs";
import "bootstrap";
import '@/lib/filters'

import { SquareSpinner } from 'vue-spinners'

const app = createApp(App);
app.component('QuillEditor', QuillEditor)
app.component('square', SquareSpinner)
const toastoption: PluginOptions = {
    // You can set your default options here
};
const options = {
    color: "#409eff",
    failedColor: "#409eff",
    thickness: "5px",
    transition: {
        speed: "0.12s",
        opacity: "0.3s",
        termination: 10,
    },
    autoRevert: true,
    location: "top",
    inverse: false,
};


app.config.globalProperties.$filters = {
    str_limit(value, size) {
      if (!value) return '';
      value = value.toString();
  
      if (value.length <= size) {
        return value;
      }
      return value.substr(0, size) + '...';
    }
  }
  
app.use(VueProgressBar, options)
app.use(Toast, toastoption);
app.use(store);
app.use(router);
app.use(ElementPlus);
app.use(SquareSpinner);
app.use(VueLoading);

ApiService.init(app);
// MockAdapter.init(app);
initApexCharts(app);
initInlineSvg(app);
initVeeValidate();

app.use(i18n);

app.mount("#app");
