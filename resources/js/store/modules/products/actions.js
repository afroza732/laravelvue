import * as actions from '../../action-type'
import * as mutations from '../../mutaton-type'
import Axios from 'axios'

export default {
    [actions.ADD_PRODUCT]({ commit }, payload) {
        Axios.post('/products', payload)
        .then(res =>{
            if(res.data.success == true){
                window.location.href = '/products';
            }
        })
        .catch(err =>{
            commit(mutations.SET_ERRORS,err.response.data.errors);
        })
    }
}
