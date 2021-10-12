<template>
<div>
        <div class="container animated fadeIn fast contentMain">
            <img class="imgMain" loading="lazy" style="width: 100%;" src="/img/BanerNetflix.jpg" alt="BanerNetflix.jpg">
        </div>

        <modal-card-component v-if="selectPack" :pack="selectPack"/>

        <div class="col-12 d-flex flex-column align-items-center animated fadeIn fast py-5 text-center" align="center">
            <div class="d-flex justify-content-center">
                <img loading="lazy" src="/img/publico/logo.png" class="d-inline-block align-top imgTotal" alt="logo-totalplay-n">
                <h1 class="text-white">&nbsp;&nbsp; + &nbsp;&nbsp;</h1>
                <img loading="lazy" src="/img/logo-netflix.png" class="d-inline-block align-top imgPack" alt="logo-totalplay-n">
            </div>
            <div>
                <h1 class="text-white">Totalplay TV + Internet</h1>
            </div>
        </div>

        <div class="col-12">
            <div class="row d-flex flex-wrap justify-content-center px-3">
                <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 px-4 py-2" v-for="(pack,index) in packNetflix" :key="index">
                    <card-test-component :pack="pack" :clearInput="true" @openModal="openModal"/>
                </div>
            </div>
        </div>


        <div class="col-12 d-flex flex-column align-items-center animated fadeIn fast py-5 text-center" align="center">
            <div class="d-flex justify-content-center">
                <img loading="lazy" src="/img/publico/logo.png" class="d-inline-block align-top imgTotal" alt="logo-totalplay-n">
                <h1 class="text-white">&nbsp;&nbsp; + &nbsp;&nbsp;</h1>
                <img loading="lazy" src="/img/logo-netflix.png" class="d-inline-block align-top imgPack" alt="logo-totalplay-n">
            </div>
            <div>
                <h1 class="text-white">Internet</h1>
            </div>
        </div>

        <div class="col-12">
            <div class="row d-flex flex-wrap justify-content-center px-3">
                <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 px-4 py-2" v-for="(pack,index) in packInternetNetflix" :key="index">
                    <card-test-component :pack="pack" :clearInput="true" @openModal="openModal"/>
                </div>
            </div>
        </div>

</div>
</template>

<script>
import CradTest1 from '../fragments/Carstest1';
import NetflixJson from '../packs/netflix/packNetflix';
import packInternetNetflixJson from '../packs/netflix/packInternetNetflix';
import modalPack from '../fragments/ModalCard';

export default {
    components:{
        'card-test-component': CradTest1,
        'modal-card-component':  modalPack
    },
    metaInfo() {
        return {
            title: "Totalplay",
            meta: [{
            vmid: "Netflix",
            name: "Netflix",
            content: "Totalplay con Netflix incluido a precio especial hasta 4 pantallas (ULTRA HD) aplicación incluida apps integradas conectividad estable."
            }],
            titleTemplate: '%s | Netflix',
            htmlAttrs: {
                lang: 'es',
                amp: true
            },
        };
    },
    mounted(){
        $('body, html').animate({scrollTop: '0px'}, 1100);
    },
    data() {
        return {
            selectPack:null,
            packNetflix: NetflixJson,
            packInternetNetflix: packInternetNetflixJson
        }
    },
    methods:{
        openModal(pack){
            this.selectPack = pack;
        }
    }
}
</script>
