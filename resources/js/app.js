import './bootstrap';
import {createApp} from 'vue';
import App from './global/App.vue';
import { createVuestic } from 'vuestic-ui'
import 'vuestic-ui/css'

createApp(App)
    .use(createVuestic())
    .mount('#app');
