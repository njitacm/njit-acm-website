import { createApp } from 'vue'
import router from "./router.js"
import App from './App.vue'
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
import 'material-symbols';

const app = createApp(App);

app.component("Header", Header)
app.component("Footer", Footer)

app.use(router)

app.mount('#app')
