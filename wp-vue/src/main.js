import Vue from 'vue'
import vpupApp from './vpupApp.vue'
import VModal from 'vue-js-modal'
import VueCarousel from 'vue-carousel'
import VueFormulate from '@braid/vue-formulate'

Vue.use(VModal)
Vue.use(VueFormulate)
Vue.use(VueCarousel)

Vue.config.productionTip = false
// Mount our instance
new Vue({
  render: h => h(vpupApp),
}).$mount('#vpup-app')
