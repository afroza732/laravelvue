import * as mutations from '../../../mutaton-type'

export default{
[mutations.SET_ERRORS](state,payload){
    state.is_errors = true;
    state.errors = payload;
}
}