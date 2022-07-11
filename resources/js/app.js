require('./bootstrap');
require("./bootstrap")


import {createApp} from "vue"

createApp({})
    .component("app-vue",require("./components/App.vue").default)
    .mount("#app")
