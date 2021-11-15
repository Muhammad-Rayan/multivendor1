<template>
    <el-input type="file"
        @ready="upload" accept="images/*"
        v-model="form.image"
    ></el-input>
</template>
<script type="text/javascript">
import { form } from '@/lib/mixins'
    export default {
        mixins: [ form ],
        methods: {
            upload(e) {
                console.log(e);
                const files = e.target.files
                if(files && files.length > 0) {
                    this.$emit('ready', {
                        target: {
                            value: files[0]
                        }
                    })
                }
            }
        }
    }
</script>
