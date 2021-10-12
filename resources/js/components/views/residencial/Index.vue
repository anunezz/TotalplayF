<template>
<div class="py-1">

    <modal-card-component v-if="selectPack !== null" :pack="selectPack"/>

    <div class="animated fadeIn fast" style="width: 100%; margin: 0px auto; margin-top: -40px;">
        <div class="row no-gutters text-white height:500px; text-center d-flex justify-content-center">
            <div class="text-center col-xs-12 col-sm-12 col-md-12 imgBannerPrincipal">
                <div class="imgBanish text-right" style="margin-top: 100px; padding-right: 13%;">
                    <h2>¡Conéctate a la nueva realidad <br> con el internet más veloz! </h2>
                    <br>
                    <h4 class="text-warning">Descubre la experiencia<br> de la mejor tecnología</h4>
                </div>
                <div class="col-12 imgVisiblebotton" style="margin-top: 20px;">
                    <h5 class="text-right text-warning">
                        Descubre la experiencia <br> de la mejor tecnología
                    </h5>
                </div>
            </div>
            <div class="col-12 imgVisiblebotton">
                    <h4>¡Conéctate a la nueva realidad <br> con el internet más veloz!</h4>
            </div>
        </div>
    </div>

    <div class="col-12 pb-3">
        <div class="row d-flex justify-content-center container-fluid">
            <div class="btn-group">
                <button @click="getTypeCard(1)" v-bind:class="{ active: btnIsActive }" class="btn btn-outline-primary btn-lg">Internet + TV</button>
                <button @click="getTypeCard(2)" v-bind:class="{ active: !btnIsActive }" class="btn btn-outline-primary btn-lg">Internet</button>
            </div>
        </div>
    </div>

    <div class="col-12 py-2 animated fadeIn fast pb-3 text-center" align="center">
        <img loading="lazy" src="/img/publico/logo.png" width="240" height="50" alt="logo">
        <h1 class="text-white h3-sm" v-text="(btnIsActive)?'Totalplay TV + Internet':'Totalplay + Internet'"></h1>
    </div>

    <div class="col-12">
        <div class="row d-flex flex-wrap justify-content-center px-3">
            <div class="col-md-4 px-4 py-2" v-for="(pack,index) in packTotal" :key="index">
                <card-test-component v-if="btnIsActive" :pack="pack" @openModal="openModal"/>
                <card-test-component v-else :pack="pack" @openModal="openModal"/>
            </div>
        </div>
    </div>

</div>
</template>

<script>
import Cards from '../fragments/Cards';
import CradInternet from '../fragments/CardInternetTv';
import CradTest1 from '../fragments/Carstest1';
import packInternetTV from '../packs/residencial/packInternetTV.json';
import packInternet from '../packs/residencial/packInternet.json';
import modalPack from '../fragments/ModalCard';
export default {
    components:{
        'cards-component':Cards,
        'card-internettv-component':CradInternet,
        'card-test-component': CradTest1,
        'modal-card-component':  modalPack,
    },
    metaInfo() {
        return {
        title: "Totalplay",
        meta: [
            {
            vmid: "Residencial",
            name: "Residencial",
            content: "El internet de fibra optica más veloz de México, encuentra el paquete que más acomode a tus necesidades Netflix - Amazon Prime - HBO -STARCHANNEL - Totalplay."
            }
        ],
        titleTemplate: '%s | Residencial',
            htmlAttrs: {
                lang: 'es',
                amp: true
            },
        };
    },
    mounted(){
        this.getTypeCard(1);
        $('body, html').animate({scrollTop: '0px'}, 1100);
    },
    data() {
        return {
            btnIsActive: true,
            packTotal: [],
            selectPack:null
        }
    },
    methods:{
        openModal(pack){
            this.selectPack = pack;
        },
        getTypeCard(val){
            this.btnIsActive = ( val === 1 )? true: false;
            this.packTotal = ( val === 1 )? packInternetTV : packInternet;
        }
    }
}
</script>
