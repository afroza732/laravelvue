import * as actions from '../../action-type'
import * as mutations from '../../mutaton-type'
import Axios from 'axios'

export default {
    [actions.ADD_PRODUCT]({ commit }, payload) {
        Axios.post('/products', payload)
    }
}