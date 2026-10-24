import { createApp } from 'vue';
import router from "./router.js";
import App from './App.vue';
import NavBar from './components/NavBar.vue';
import Footer from './components/Footer.vue';
import 'material-symbols';
import store from "./store.js";
import { observeImageFade } from './behaviors/imageFade.js';
const app = createApp(App);

app.component("NavBar", NavBar);
app.component("Footer", Footer);

app.use(store);
app.use(router);

app.mount('#app');

const stopImageFade = observeImageFade(document.getElementById('app'));
app.onUnmount(stopImageFade);

if (import.meta.hot) {
  import.meta.hot.dispose(stopImageFade);
}
