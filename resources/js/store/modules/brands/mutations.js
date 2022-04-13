import * as mutations from '../../mutaton-type'

export default {
    [mutations.SET_BRANDS](state, payload) {
        //console.log(state.categories, payload)
        state.brands = payload
    }
}