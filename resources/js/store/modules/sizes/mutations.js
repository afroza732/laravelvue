import * as mutations from '../../mutaton-type'

export default {
    [mutations.SET_SIZES](state, payload) {
        //console.log(state.categories, payload)
        state.sizes = payload
    }
}