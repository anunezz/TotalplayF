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
    computed:{
        objectItems(){
            return {
                page: 'amazon',
                img: {
                    triple: '/img/publico/promociones/amazon/title/titulo_anazon_tv_e_ internet.png',
                    double: '/img/publico/promociones/amazon/title/titulo_netflix_internet.png',
                    banner: this.$store._modules.root.state.totalplay.imgBannerAmazon
                },
                catPromotion: this.$store._modules.root.state.totalplay.catAmazon
            };
        }
    },
    data() {
        return {
        }
    },
}
</script>
