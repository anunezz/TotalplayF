<template>
<div>
    <div class="container">

        <div :style="'width: 100%; '+mediaBanner" v-if="items.page != 'home'">
            <img style="width: 100%; max-height: 500px;" :src="items.img.banner" :alt="items.img.banner">
        </div>

        <div class="row">
            <div class="col-md-12" v-if="items.page === 'home'">
                <div class="col-md-12">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xs-12 col-sm-12 col-md-4 button-spacing">
                            <el-button style="width: 100%;" type="primary" plain round  @click="btn_double_triple = true,setPacks(true)"> Internet + TV </el-button>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <el-button style="width: 100%;" type="primary" plain round @click="btn_double_triple = false,setPacks(false)"> Internet </el-button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4 col-md-12" v-else>
                <img :style="mediaImgTitle+' display:block; margin: 0px auto;'"  :src="items.img.triple" :alt="items.img.triple">
            </div>

            <div class="col-md-12 py-4" v-if="items.page === 'home'">
                <img v-if="btn_double_triple === true"  :style="mediaImgTitleHome+' height: 100px; display:block; margin: 0px auto;'"  :src="items.img.triple" :alt="items.img.triple">
                <img v-if="btn_double_triple === false" :style="mediaImgTitleHome+' height: 100px; display:block; margin: 0px auto;'"  :src="items.img.double" :alt="items.img.double">
            </div>

            <card-component :items="items.catPromotion" v-if="items.page === 'home'" />
            <card-component :items="catTriple" v-if="items.page !== 'home'" />

            <div class="py-4 col-md-12" v-if="items.page !== 'home'">
                <img :style="mediaImgTitle+' display:block; margin: 0px auto;'" :src="items.img.double" :alt="items.img.double">
            </div>

            <card-component :items="catDouble" v-if="items.page !== 'home'" />

        </div>
    </div>
</div>
</template>

<script>
import {Globals} from "../../../mixins/Globals";
import Card from '../fragments/Card';
export default {
    mixins:[Globals],
    props: { items: Object },
    components:{
        'card-component': Card,
    },
    data() {
        return {
            btn_double_triple: true
        }
    },
    computed: {
        catTriple(){
            let data = [];
                if(this.items.page !== 'home' ){
                    for (let i = 0; i < this.items.catPromotion.length; i++) {
                        if(this.items.catPromotion[i].triple_double === 1){
                            data.push(this.items.catPromotion[i]);
                        }
                    }
                }
            return data;
        },
        catDouble(){
            let data = [];
                if(this.items.page !== 'home' ){
                    for (let i = 0; i < this.items.catPromotion.length; i++) {
                        if(this.items.catPromotion[i].triple_double === 2){
                            data.push(this.items.catPromotion[i]);
                        }
                    }
                }
            return data;
        },
        mediaBanner() {
            let aux = "margin-top: 45px;"; //computadora
            if(this.$screen.width < 800){
                aux = "margin-top: 68px;";    //celular
            }
            return aux;
        },
        mediaImgTitle() {
            let aux = "width: 50%;"; //escritorio
            if(this.$screen.width < 950){
                aux = "width: 100%;"; //celular
            }
            return aux;
        },
        mediaImgTitleHome() {
            let aux = "width: 30%;"; //escritorio
            if(this.$screen.width < 950){
                aux = "width: 100%;"; //celular
            }
            return aux;
        }
    },
    methods:{
    },
    created(){
        this.setPacks();
    },
}
</script>

<style scope>
img[src*=".svg"].tp-popup-logo, img.tp-popup-logo {
    max-width: 170px;
    width: 100%;
    vertical-align: middle;
}

@media screen and (min-width: 0px) and (max-width: 640px) {
    img[src*=".svg"].tp-popup-logoo, img.tp-popup-logoo {
        max-width: 170px;
        width: 20%;
    }
}
</style>
