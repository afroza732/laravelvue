import * as actions from '../../action-type'
import * as mutations from '../../mutaton-type'
import Axios from 'axios'

export default {
    [actions.GET_SIZES]({ commit }) {
        Axios.get('/api/get-sizes').then(res => {
            if (res.data.success == true) {
                commit(mutations.SET_SIZES, res.data.data)
            }
        })
    }
}