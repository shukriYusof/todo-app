import './bootstrap';
import { createApp } from "vue";
import App from '@/Views/App.vue'
import Router from './router.js'
import Store from './store.js'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faUserSecret, faArrowLeft, faArrowRight, faHouse, faListCheck } from '@fortawesome/free-solid-svg-icons'

library.add([faUserSecret, faArrowLeft, faArrowRight, faHouse, faListCheck])
const app = createApp(App);
app.use(Router).use(Store).component('font-awesome-icon', FontAwesomeIcon).mount("#app")
app.config.globalProperties.globalValue = "This is a global value";

export default app
