/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import  router from './routes';
import {createPinia} from 'pinia';
import { createVfm } from 'vue-final-modal'

import 'bootstrap'
// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import '@/../css/colors.css'

import Toaster from "@meforma/vue-toaster";
import Paginate from "vuejs-paginate-next";

import './axios'
import 'vue-final-modal/style.css'



import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faTrashCan } from "@fortawesome/free-regular-svg-icons";
import { faTelegram,faGithub,faLinkedinIn,faTwitter, faMedium, faDiscord } from "@fortawesome/free-brands-svg-icons";
import { faPenToSquare,faGlobe,faSquarePlus,faAddressCard,faFolderPlus,faCircleArrowLeft,faCheck,faBan } from "@fortawesome/free-solid-svg-icons";

library.add(faPenToSquare,faTrashCan,faTelegram,faGithub,faGlobe,faSquarePlus,faAddressCard,faFolderPlus,faCircleArrowLeft,faLinkedinIn,faTwitter, faMedium, faDiscord,faCheck,faBan );


const  pinia = createPinia();

const app = createApp({});
const vfm = createVfm()

app.component("font-awesome-icon", FontAwesomeIcon)


app.use(Toaster).provide('toast', app.config.globalProperties.$toast);
app.use(router);
app.use(pinia);
app.use(vfm);
app.use(Paginate);

app.mount('#app');


