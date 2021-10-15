<template>
<div style="background-color: #1e1e28;">

    <menu-component />
    <footer2-component />

    <div style="width: 100%; height: 28px;"></div>

    <router-view  />
    <whatsapp-component />

    <footer-component  />

</div>
</template>

<script>
import MenuComponent from "../../components/views/fragments/Menu.vue";
import FooterComponent from "../../components/views/fragments/Footer.vue";
import WhatsappComponent from "../../components/views/fragments/Whatsapp";
import Footer2Component from "../../components//views/fragments/Footer2";
import FormMain from '../../components/views/fragments/FormBanerRight';

export default {
    components:{
        'footer-component': FooterComponent,
        'menu-component': MenuComponent,
        'whatsapp-component':WhatsappComponent,
        'footer2-component':Footer2Component,
        'form-baner-component': FormMain
    }
}
</script>


<style>

.contentMain:hover .imgMain {
    -webkit-transform:scale(1.05);
    transform:scale(1.05);
    transition:all .5s ease-in-out;
}
.contentMain {overflow:hidden;}

a:hover{
    cursor:pointer;
}

.div-index .footer2{
    position: sticky;
    margin-top: 0px;
}

.imgTotal{
    width: 240px;
    height: 50px;
}
.imgPack{
    width: 180px;
    height: 50px;
}

.imgBannerPrincipal{
    height: 480px;
    background-image: url('/img/BannerPrincipal/banner-principal.png');
    background-size: 45% 65%;
    background-position: 15% 45%;
    background-repeat: no-repeat;
}

.imgBanish{
    display: block;
}

.imgVisiblebotton{
    display: none;
}

@media screen and (min-width: 0px) and (max-width: 1054px) {
    .imgTotal{
        width: 200px;
        height: 35px;
    }
    .imgPack{
        width: 130px;
        height: 35px;
    }

    .imgBannerPrincipal{
        height: 240px;
        background-image: url('/img/BannerPrincipal/banner-principal.png');
        background-size: 80% 60%;
        background-position: 10% 60%;
        background-repeat: no-repeat;
    }

    .imgBanish{
        display: none;
    }

    .imgVisiblebotton{
        display: block;
    }

}

</style>
