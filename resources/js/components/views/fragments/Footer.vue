<template>
<div>
    <div class="container-fluid py-5 text-white text-center">
        <h3 style="color: #E0E0E0;">Disfruta en Totalplay TV que incluye aplicaciones en todos sus decodificadores 4K</h3>
        <h4 style="color: #BDBDBD;">Disfruta de tus contenidos favoritos, en cualquier momento y desde cualquier lugar.</h4>
    </div>

    <div class="py-3 container" align="center">
        <img src="/img/Streaming-Transparente.png" class="img-fluid" width="90%" alt="Streaming-Transparente">
    </div>

    <div class="animated fadeIn fast text-center d-flex flex-column align-items-center col-xs-12 col-sm-12 col-md-5 container">
        <div class="py-5">
            <h4 class="text-white">Dejanos tus datos nosotros te contactamos o comunicate GRATIS.</h4>
            <h3 class="text-info"><a href="tel:8005129092" target="_blank"> <i class="fa fa-phone phone-icon"></i> 800 5129092</a></h3>
            <h3 class="text-white">Contratación Personalizada</h3>
        </div>
        <form-baner-component />
        <br>
        <div class="text-white">
            <p>Linea de Atención al cliente</p>
            <p> <a class="text-white" href="tel:8005100510" target="_blank">Clic para llamar <i class="fa fa-phone phone-icon"></i> 800 5100510</a></p>
        </div>
    </div>

    <div class="bg-inverse text-white py-1" style="background-color: #1e1e28;">
        <div class="container text-center">

            <div class="row d-flex d-colum atign-items-center">
                <div class="col-md-12">
                    <p>
                        <a @click="currentUrl(urlPath)">
                            <router-link to="/terminos-y-condiciones" > Terminos y condiciones. </router-link>
                        </a>
                    </p>
                </div>
                <div class=" col-md-12 py-3 text-center d-flex justify-content-center">
                    <div>
                        <img loading="lazy" src="/img/publico/logo.png" width="188" height="37" class="img-fluid" alt="logo.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
import { RouterPush } from '../Mixins/RouterPush.js';
import FormBanerRight from '../fragments/FormBanerRight';
import { mapState } from "vuex";
export default {
mixins: [RouterPush],
components:{
    "form-baner-component": FormBanerRight
},
computed:{
    ...mapState('menu',['activeMenu']),
    urlPath(){
        return this.$router.history.current.path;
    }
}
}
</script>

<style>

</style>
