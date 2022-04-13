import * as mutations from '../../mutaton-type'

export default {
    [mutations.SET_CATEGORIES](state, payload) {
        //console.log(state.categories, payload)
        state.categories = payload
    }
}