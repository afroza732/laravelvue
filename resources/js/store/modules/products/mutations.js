import * as mutations from '../../mutaton-type'

export default {
    [mutations.SET_PRODUCT](state, payload) {
        //console.log(state.categories, payload)
        state.products = payload
    }
}