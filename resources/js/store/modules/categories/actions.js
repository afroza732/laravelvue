import * as actions from '../../action-type'
import * as mutations from '../../mutaton-type'
import Axios from 'axios'

export default {
    [actions.GET_CATEGORIES]({ commit }) {
        Axios.get('/api/get-categories').then(res => {
            if (res.data.success == true) {
                commit(mutations.SET_CATEGORIES, res.data.data)
            }
        })
    }
}