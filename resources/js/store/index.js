import { createApp } from 'vue'
import { createStore } from 'vuex'

const app = createApp({});

app.use(createStore);

import categories from './modules/categories'
export default createStore({
    modules: {
        categories
    }
})