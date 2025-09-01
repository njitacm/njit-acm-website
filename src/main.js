import { createApp } from 'vue'
import router from "./router.js"
import App from './App.vue'
import TheHeader from './components/TheHeader.vue';
import TheFooter from './components/TheFooter.vue';
import 'material-symbols';
import "./assets/styles/themes.css";

const app = createApp(App);

app.component("TheHeader", TheHeader)
app.component("TheFooter", TheFooter)

app.use(router)

app.mount('#app')
