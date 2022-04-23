require('./bootstrap');
import Vue from 'vue'
import { createInertiaApp,  InertiaLink} from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'
import swal from 'sweetalert'
import VueElementLoading from "vue-element-loading";

Vue.component("vue-element-loading", VueElementLoading);

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('inertia-link', InertiaLink);

InertiaProgress.init({
   // The delay after which the progress bar will
  // appear during navigation, in milliseconds.
  delay: 250,

  // The color of the progress bar.
  color: '#29d',

  // Whether to include the default NProgress styles.
  includeCSS: true,

  // Whether the NProgress spinner will be shown.
  showSpinner: false,
});
createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props }) {
    new Vue({
      render: h => h(App, props),
    }).$mount(el)
  },
})