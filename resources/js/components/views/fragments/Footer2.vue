<template>
<div v-if="$store._modules.root.state.totalplay.footer2.isActive === 1" class="row no-gutters footer2 d-flex justify-content-center flex-wrap text-center" :style="'margin-top: 50px; width: 100%; background:'+$store._modules.root.state.totalplay.footer2.background+'; height: 80px;'">
    <div class="col-md-6 color-text tel" v-if="mediaWidthCarousel">
        <a :href="'tel:+52'+$store._modules.root.state.totalplay.footer2.cellPhone">{{ $store._modules.root.state.totalplay.footer2.message }} <br> {{ $store._modules.root.state.totalplay.footer2.cellPhone }}</a>
    </div>
    <div :class="(mediaWidthCol?'col-md-12':'col-md-5')">
        <formfotter2-component style="margin: 0px auto; margin-top: 20px; width: 80%;" />
    </div>

</div>
</template>

<script>
import newFormFooter2 from '../fragments/FormFooter2';
export default {
    components:{
        'formfotter2-component': newFormFooter2,
    },
    computed:{
        mediaWidthCarousel() {
            return this.$screen.width > 1038? true: false;
        },
        mediaWidthCol() {
            return this.$screen.width > 801? false: true;
        }
    }
}
</script>

<style scoped>
.tel a{
    text-decoration: none;
    color: #F54D9D;
    font-size: 24px;
    font-weight: 900;
    cursor:pointer;
}
.color-text{
    display: flex;
    justify-content: center;
    align-items: center;
}
@media screen and (min-width: 0px) and (max-width: 1054px) {
    .color-text{
        display: flex;
        justify-content: center;
        align-items: center;
        color: #F54D9D;
        font-size: 20px;
        font-weight: 900;
    }
}
</style>>

