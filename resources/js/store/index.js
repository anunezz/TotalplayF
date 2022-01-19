import Vue from 'vue'
import Vuex from 'vuex'

//import totalplay from './modules/totalplay'
// import memory from './modules/memory'
// import loading from './modules/loading'
import menu from './modules/menu';
import user from './modules/user'
// import bulkLoading from './modules/bulkLoadingErrors'
// import createPersistedState from "vuex-persistedstate";
Vue.use(Vuex);

export default new Vuex.Store({
    // plugins:[
    //     createPersistedState({
    //         key: 'memory',
    //         paths:['memory']
    //     }),
    // ],
    modules: {
        //totalplay,
        user,
        menu
        // bulkLoading,
        // loading,
        // memory
    }
});
