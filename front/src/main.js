import Vue from "vue";
import App from "./App.vue";

import { BootstrapVue, IconsPlugin,BootstrapVueIcons } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(BootstrapVueIcons);

import { BootstrapIconsPlugin } from 'bootstrap-icons-vue';
Vue.use(BootstrapIconsPlugin);

import axios from "axios";
import VueAxios from "vue-axios";
Vue.use(VueAxios, axios);

import vSelect from "vue-select";
Vue.component("v-select", vSelect);
import "vue-select/dist/vue-select.css";

const moment = require("moment");
require("moment/locale/pt-br");

Vue.use(require("vue-moment"), {
  moment,
});

import { library } from "@fortawesome/fontawesome-svg-core";
import { faUserSecret } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(faUserSecret);

Vue.component("font-awesome-icon", FontAwesomeIcon);

Vue.config.productionTip = false;

new Vue({
  render: (h) => h(App),
}).$mount("#app");
