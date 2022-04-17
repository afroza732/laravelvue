import { createApp } from 'vue'
import { createStore } from 'vuex'

const app = createApp({});

app.use(createStore);

import categories from './modules/categories'
import brands from './modules/brands'
import sizes from './modules/sizes'
import products from './modules/products'
export default createStore({
    modules: {
        categories,
        brands,
        sizes,
        products,
    }
})