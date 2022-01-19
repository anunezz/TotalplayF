const state = {
    activeMenu: 0
};

const mutations = {
    increment(state){
        state.count ++;
    },
    selectMenuActive(state,val){
        state.activeMenu = val;
    }
};

const actions = {

};

const getters = {

};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
};
