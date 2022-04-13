import * as actions from '../../action-type'
import * as mutations from '../../mutaton-type'
import Axios from 'axios'

export default {
    [actions.GET_BRANDS]({ commit }) {
        Axios.get('/api/get-brands').then(res => {
            if (res.data.success == true) {
                commit(mutations.SET_BRANDS, res.data.data)
            }
        })
    }
}