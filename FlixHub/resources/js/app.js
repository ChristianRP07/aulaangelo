require('./bootstrap');

import Vue from 'vue';
import App from './vue/app';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'

library.add(faUserSecret)

Vue.config.productionTip = false

const app = new Vue({
    el: '#app',
    components: { App },
    template: '<App/>'
});