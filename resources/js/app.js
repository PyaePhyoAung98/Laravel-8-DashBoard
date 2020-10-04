import { InertiaApp } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import {InertiaProgress} from '@inertiajs/progress'

import vuetify from '../js/plugins/vuetify'

import Toastr from 'vue-toastr';
import axios from 'axios';

Vue.use(axios);

Vue.use(Toastr);

Vue.use(InertiaApp)
Vue.mixin({ methods: { route: window.route } })
const app = document.getElementById('app')

InertiaProgress.init();

new Vue({
  vuetify,
  render: h => h(InertiaApp, {
    props: {
      initialPage: JSON.parse(app.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default,
    },
  }),
}).$mount(app)