<template>
<div>
    <promotions-component :items="objectItems" />
    <whatsapp-component />
    <footer2-component />
</div>
</template>

<script>
import Promotions from '../fragments/Promotions';
import WhatsappComponent from "../fragments/Whatsapp";
import Footer2Component from "../fragments/Footer2";
export default {
    components:{
        'promotions-component': Promotions,
        'whatsapp-component':WhatsappComponent,
        'footer2-component':Footer2Component
    },
    metaInfo() {
        return {
        title: "Totalplay",
        meta: [
            {
            vmid: "Netflix",
            name: "Netflix",
            content:
                "Haz Match - Contrata un paquete con Totalplay + Netflix Incluido"
            }
        ],
        titleTemplate: '%s - Totalplay Netflix',
            htmlAttrs: {
                lang: 'en',
                amp: true
            },
        };
    },
    computed:{
        objectItems(){
            return {
                page: 'netflix',
                img: {
                    triple: '/img/publico/promociones/netflix/title/titulo_netflix_tv_e_internet.png',
                    double: '/img/publico/promociones/netflix/title/titulo_netflix_internet.png',
                    banner: this.$store._modules.root.state.totalplay.imgBannerNetflix
                },
                catPromotion: this.$store._modules.root.state.totalplay.catNetflix
            };
        }
    },
    data() {
        return {
        }
    },
}
</script>
