<template>
<div>
    <promotions-component :items="objectItems" />
</div>
</template>

<script>
import Promotions from '../fragments/Promotions';
export default {
    components:{
        'promotions-component': Promotions,
    },
    computed:{
        objectItems(){
            return {
                page: 'netflix',
                img: {
                    triple: '/img/publico/promociones/netflix/title/titulo_totalplay_y_netflix.png',
                    double: '/img/publico/promociones/netflix/title/Titulo_netflix_double.svg',
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
