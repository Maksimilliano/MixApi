import {createApp} from "vue";
import Auth from "./global/Auth.vue";
import {createVuestic} from "vuestic-ui";

createApp(Auth)
    .use(createVuestic())
    .mount('#auth-form');
