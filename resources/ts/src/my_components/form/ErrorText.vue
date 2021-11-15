<template>
    <small class="error-control" v-if="error">{{ error[0] }}</small>
</template>
<script type="text/javascript">
    export default {
        props: {
            error: {
                type: Array,
                default() {
                    return []
                }
            }
        }
    }
</script>
<style>
.error-control{
    font-size: 16px !important;
    color: red;
    position: relative;
    top: -20px !important;
}
</style>