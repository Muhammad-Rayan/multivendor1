import {inject } from 'vue'
import ProgressBar from './ProgressBar.vue'

const bar = inject.prototype.$bar = new inject(ProgressBar).$mount()

document.body.appendChild(bar.$el)

export default bar




