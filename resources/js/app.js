require('./bootstrap');

window.Vue = require('vue')
import { createApp } from 'vue'
import exampleComponent from './components/TestComponent'

const app = createApp({})

app.component('example-component', exampleComponent)

app.mount('#app')

// var MyComponent = require('./components/TestComponent.vue');

// Vue.component('example-component', require('./components/TestComponent.vue').default);
// const app = new Vue({
//     el: '#app',
// });

// Vue.component('example-component', require('./components/TestComponent.vue').default)
// const app = new Vue({
//     el: '#app',
// });

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();