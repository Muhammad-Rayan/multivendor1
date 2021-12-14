<template>
  <router-view />
  <vue-progress-bar></vue-progress-bar>
  <square></square>
</template>



<script lang="ts">
import { defineComponent, onMounted } from "vue";
import { useStore } from "vuex";
import { Mutations } from "@/store/enums/StoreEnums";
import { useToast } from "vue-toastification";

export default defineComponent({
  name: "app",
  setup() {
    const store = useStore();
    const toast = useToast();

    

    onMounted(() => {
      /**
       * this is to override the layout config using saved data from localStorage
       * remove this to use config only from static config (@/core/config/DefaultLayoutConfig.ts)
       */
      store.commit(Mutations.OVERRIDE_LAYOUT_CONFIG);
    });
  },
});
</script>
