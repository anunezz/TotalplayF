<template>
<div>
    <div style="width: 100%; margin: 0px auto; margin-top: 48px;">
        <div class="row no-gutters">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <el-carousel :interval="6000" style="width: 100%;"
                    :initial-index="0"
                    :autoplay="true"
                    arrow="always"
                    height="400px">
                    <el-carousel-item >
                        <div style="height:400px; background: url('img/publico/slider/Baner_1.png');
                        background-size: 100% 100%;"> </div>
                    </el-carousel-item>
                    <el-carousel-item >
                        <div style="height:400px; background: url('img/publico/slider/Baner_2.png');
                        background-size: 100% 100%;"> </div>
                    </el-carousel-item>
                    <el-carousel-item >
                        <div style="height:400px; background: url('img/publico/slider/Baner_3.png');
                        background-size: 100% 100%;"> </div>
                    </el-carousel-item>
                </el-carousel>
            </div>
            <div class="col-xs-12 col-ms-12 col-md-4" :style="this.$store._modules.root.state.totalplay.main">
            <!-- <div class="col-xs-12 col-ms-12 col-md-4" :style="background: #6d5c96; height:400px;"> -->
                <form-main-component :modal="false" :promotion_id="null" />
            </div>
        </div>
    </div>

    <div style="width: 50%; height: 30px;"></div>

    <promotions-component :items="objectItems" />
    <div style="width: 100%; height: 30px;"></div>
    <whatsapp-component />
    <footer2-component />


</div>
</template>

<script>
import FormMainComponent from '../fragments/FormMain';
import PromotionsComponent from '../fragments/Promotions';
import WhatsappComponent from "../fragments/Whatsapp";
import Footer2Component from "../fragments/Footer2";
export default {
    name: "App",
    components:{
        'form-main-component': FormMainComponent,
        'promotions-component': PromotionsComponent,
        'whatsapp-component':WhatsappComponent,
        'footer2-component':Footer2Component
    },
    metaInfo() {
        return {
        title: "Totalplay",
        meta: [
            {
            vmid: "Residencial",
            name: "Residencial",
            content:
                "Conecta con lo que más quieras a máxima velocidad con nuestro internet de fibra óptica"
            }
        ],
        titleTemplate: '%s - Residencial',
            htmlAttrs: {
                lang: 'en',
                amp: true
            },
        };
    },
    computed:{
        objectItems(){
            return {
                page: 'home',
                img: {
                    triple: 'img/publico/promociones/home/title/Titulos-Hogar-Tv-Internet.png',
                    double: 'img/publico/promociones/home/title/Titulos-Hogar-Internet.png'
                },
                catPromotion: this.$store._modules.root.state.totalplay.catHome
            };
        },
        mediaWidthForm() {
            return this.$screen.width > 991? +'40%;': +'100%;';
        },
        mediaWidthContent() {
            return this.$screen.width > 991?'400px;':'800px;';
        },
        mediaWidth() {
            return this.$screen.width;
        },
        mediaWidthCarousel() {
            return this.$screen.width > 991?'60%;':'100%;';
        }
    },
    data() {
        return {
        }
    },
}
</script>


<style>
.div-index .footer2{
    position: sticky;
    bottom: 0px;
}

img[src*=".svg"].tp-popup-log, img.tp-popup-log {
    max-width: 170px;
    width: 60%;
}

.el-carousel__item h3 {
    color: #475669;
    font-size: 18px;
    opacity: 0.75;
    line-height: 500px;
    margin: 0;
}

.el-carousel__item:nth-child(2n) {
    background-color: #99a9bf;
}

.el-carousel__item:nth-child(2n+1) {
    background-color: #d3dce6;
}

@media screen and (min-width: 0px) and (max-width: 640px) {
    img[src*=".svg"].tp-popup-log, img.tp-popup-log {
        max-width: 170px;
        width: 30%;
    }
}

</style>
