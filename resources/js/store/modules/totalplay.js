const state = {
    loading: false,
    state_id: null,
    catCities: [],
    catHome:[],
    catAmazon:[],
    catNetflix:[],
    creenWidth: 0,
    creenHeight: 0,
    modalForm: false,
    Wallpaper:null,
    imgBannerNetflix:null,
    imgBannerAmazon:null,
    imgSlider:[],
    main:null,
    footer2:{
        isActive:false,
        message: null,
        background: null,
        cellPhone:null
    }
};

const mutations = {
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
