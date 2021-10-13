import Vue from "vue"
import Vuex from 'vuex'
import VueRouter from "vue-router"
import axios from 'axios'
import VueScreen from 'vue-screen';
import VueMeta from 'vue-meta'
import 'bootstrap';
import "bootstrap/dist/css/style.css";
const $ = require('jquery')
window.$ = $;

//import '../css/plantilla.css';

//require('moment/locale/es');
//require('../../node_modules/animate.css/animate.css');
//require('../../node_modules/normalize.css/normalize.css');
//require('../css/app.css');
//require('./utils/filters.js');
//require('@fortawesome/fontawesome-free/css/all.min.css');

window.CryptoJS = require("crypto-js");
const hash = CryptoJS.MD5("9TMmz72hQM4ZFWKW").toString();


Vue.use( Vuex );
Vue.use( VueRouter );

Vue.use(VueScreen);

Vue.config.productionTip = false;
Vue.use(VueMeta, {
    // optional pluginOptions
    keyName: 'head'
});

Vue.prototype.$version= '1.3';

window.Vue = Vue;
window.axios = axios;

axios.defaults.headers.post["Content-Type"] = "application/json";

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'Accept': 'application/json',
    'Content-Type': 'application/json',
    'cache-control': 'no-cache="Set-Cookie", no-store, must-revalidate',
    'pragma': 'no-cache',
    'no-cache': 'Set-Cookie, Set-Directiva Cookie2',
    'Accept-C': window.acceptC
};

// if (window.sessionStorage.getItem('access_token')) {
//     window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + window.sessionStorage.getItem('access_token');
// }

axios.interceptors.request.use(function (config) {

    if(config && config.data && window.acceptC == true){
        let dataApp = JSON.stringify(config.data);
        dataApp = CryptoJS.AES.encrypt(dataApp, hash).toString();
        config.data = {
            'encrypt' : dataApp
        };
    }

    if(config && config.params &&  window.acceptC == true){
        let paramsApp = JSON.stringify(config.params);

        paramsApp = CryptoJS.AES.encrypt(paramsApp, hash).toString();
        config.params = {
            'encryptParams' : paramsApp
        };
    }

    let token = window.sessionStorage.getItem('access_token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    } else {
        config.headers.Authorization = "";
        window.sessionStorage.removeItem('access_token');
    }
    return config;
}, function (error) {
    return Promise.reject(error);
});

axios.interceptors.response.use(response => {

    if(response && response.data &&  window.acceptC == true){
        if(response.config &&
            response.config.responseType &&
            response.config.responseType =='blob'){
        }else{
            let bytes  = CryptoJS.AES.decrypt(response.data.toString(), hash);
            let plaintext = JSON.parse(bytes.toString(CryptoJS.enc.Utf8));
            response.data = plaintext;
        }
    }

    return response;

}, function (error) {
    if (error.response.status === 401){
        setTimeout(function(){
            location.reload();
        }, 100);
    }
    return Promise.reject(error);
});
