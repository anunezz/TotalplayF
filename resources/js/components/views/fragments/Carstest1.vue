<template>
<div class="card text-center animated fadeIn fast"
    style="background-color: #3B4559; margin:0px auto;" :class="pack.colorText">
    <div class="card-body text-white">
        <h4 style="height: 100%;" class="card-title font-weight-bold" :class="pack.colorText" v-html="pack.title"></h4>

        <hr class="text-white" style="color: #666; background-color: #FFFFFF;">

        <div>
            <img class="img-fluid" loading="lazy" src="/img/totalplaytv.svg" alt="totalplaytv">
        </div>

        <hr class="text-white" style="color: #666; background-color: #FFFFFF;">

        <div style="width: 50%;" class="mx-auto py-3 d-flex justify-content-between">
            <img loading="lazy" class="img-fluid" src="/img/iconos/4k.svg" alt="4k">
            <img loading="lazy" class="img-fluid" src="/img/iconos/appsintegradas.svg" alt="appsintegradas">
            <img loading="lazy" class="img-fluid" src="/img/iconos/repetidorwifi.svg" alt="repetidorwifi">
            <img loading="lazy" class="img-fluid" src="/img/iconos/replay.svg" alt="replay">
            <img loading="lazy" class="img-fluid" src="/img/iconos/tv.svg" alt="tv">
        </div>

        <div style="width: 100%; height: 70px; font-size: 19px;">
            <p class="card-text" v-html="pack.description"></p>
        </div>

    </div>

    <div class="card-body text-white" :style="'background-color: #212121; border-radius:5%; border-width: 6px; border-style: solid; border-color:'+ pack.colorHex+';'">
        <div style="margin: 0 auto; width: 65%; background-color: #F44336; border-radius: 5%;">PROMOCIÓN ESPECIAL</div>
        <h4 class="card-title" :class="pack.colorText" style="font-weight: 700; font-style: italic;" v-html="pack.cost"></h4>
        <span v-html="pack.costDescription"></span>
    </div>

    <div class="card-body" :class="pack.colorText" :style="'width: 100%; height:'+(pack.img)?'230px;':'130px;'">
            <span :style="'font-weight: 700; font-size: 25px; color: '+pack.colorHex"> + Descuento de por vida</span>
            <br>
            <span v-if="pack.descuento" class="text-white" v-text="pack.descuento"></span>
            <div style="margin: 0px auto; width: 50%; align-items: center;" v-if="pack.img">
                <img class="img-fluid" style="height: 90px; width: 150px;" loading="lazy" :src="pack.img" :alt="pack.img">
            </div>
        <br>
        <h4 class="text-white" v-text="pack.prontopago"></h4>
    </div>

    <div class="card-footer py-3">
        <button
        type="button"
        data-toggle="modal"
        data-target="#staticBackdrop"
        @click="openModal(pack)"
        style="width: 100%;"
        class="btn btn-lg d-block text-white btn-info">  Contrata ahora</button>
    </div>
</div>
</template>

<script>
export default {
    props: {
        pack: {
            type: Object,
        },
    },
    methods:{
        openModal(pack){
            this.$emit("openModal",pack);
        }
    }
}
</script>

<style scoped>

</style>
