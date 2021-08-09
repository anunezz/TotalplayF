<template>
<div class="py-1">
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

    <div class="row no-gutters d-flex justify-content-center d-wrap container-fluid py-2">
        <div class="col-md-4 p-2">
            <button @click="getTypeCard(1)" class="btn btn-primary btn-block btn-lg text-white" type="button">Internet + TV</button>
        </div>
        <div class="col-md-4 p-2">
            <button @click="getTypeCard(2)" class="btn btn-primary btn-block btn-lg text-white" type="button">Internet</button>
        </div>
    </div>

    <div class="col-12 animated fadeIn fast py-3 text-center" align="center">
        <img loading="lazy" src="/img/publico/logo.png" width="240" height="50" alt="logo">
        <h1 class="text-white h3-sm" v-text="(packBtn === 1)?'Totalplay TV + Internet':'Totalplay + Internet'"></h1>
    </div>

    <!-- <card-internettv-component :typePack="true" :packTotal="packInternetTV" /> -->
    <cards-component :typePack="true" :packTotal="packTotal" />

</div>
</template>

<script>
import Cards from '../fragments/Cards';
import CradInternet from '../fragments/CardInternetTv';
export default {
    components:{
        'cards-component':Cards,
        'card-internettv-component':CradInternet
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
            packInternetTV:[
                {   id:1,
                    type: true, //Si es Internet + television
                    name: 'Diviértete 40 Megas',
                    colorText:'text-warning',
                    title: "Diviértete <br><span style='font-size: 45px;'>40 MEGAS</span>",
                    color:'bg-warning',
                    colorBtn:"btn-warning",
                    colorHex: "#FFEA00",
                    description: 'Totalplay TV en una televisión <div style="width: 60%; margin: 0px auto; margin-top: 35px;"><hr class="text-white" style="color: #666; background-color: #FFFFFF;"></div>',
                    cost:"Doble de megas <br>80",
                    img:null,
                    descuento: "- $40 a partir del 6° mes",
                    costDescription:"3 meses<br><br>",
                    prontopago: "Pronto Pago $ 669"
                },
                {   id:2,
                    type: true, //Si es Internet + television
                    name: 'Diviértete + 100 MEGAS',
                    colorText:'text-info',
                    title: "Diviértete + <br><span style='font-size: 45px;'>100 MEGAS</span>",
                    color:'bg-info',
                    colorBtn:"btn-info",
                    colorHex: "#F04E98",
                    description: 'Totalplay TV en una televisión <div style="width: 60%; margin: 0px auto; margin-top: 35px;"><hr class="text-white" style="color: #666; background-color: #FFFFFF;"></div>',
                    cost:"Doble de megas <br>200",
                    img:null,
                    descuento: "- $70 a partir del 6° mes",
                    costDescription:"<strong>140 Canales (100 HD)</strong> <br> por 3 meses",
                    prontopago: "Pronto Pago $ 769"
                },
                {   id:3,
                    type: true, //Si es Internet + television
                    name: 'Emociónate 200 MEGAS',
                    colorText:'text-primary',
                    title: "Emociónate <br><span style='font-size: 45px;'>200 MEGAS</span>",
                    color:'bg-primary',
                    colorBtn:"btn-primary",
                    colorHex: "#40C4FF",
                    description: 'Totalplay TV en una televisión <br> Repetidor WiFi<br><br>',
                    cost:"Doble de megas <br>400",
                    img:null,
                    descuento: "- $80 a partir del 6° mes",
                    costDescription:"<strong>230 Canales (135 HD)</strong> <br> por 3 meses",
                    prontopago: "Pronto Pago $ 1,199"
                },
                {   id:4,
                    type: true, //Si es Internet + television
                    name: 'Sorpréndete 500 MEGAS',
                    colorText:'text-secondary',
                    title: "Sorpréndete <br><span style='font-size: 45px;'>500 MEGAS</span>",
                    color:'bg-secundary',
                    colorBtn:"btn-secondary",
                    colorHex: "#AE80FC",
                    description: 'Totalplay TV en una televisión <br> Además elige un repetidor WiFi <br> o 1 Totalplay TV Adicional',
                    img:null,
                    descuento: "- $100 a partir del 6° mes",
                    cost:"Todos los canales<br><br>",
                    costDescription:"<strong>280 Canales (165 HD)</strong> <br> por 3 meses",
                    prontopago: "Pronto Pago $ 1,779"
                    },
            ],
            // PAQUETE INTERNET
            packInternet:[
                {   id:1,
                    type: false, //Si es Internet
                    name: 'Diviértete 40 Megas',
                    colorText:'text-warning',
                    title: "Diviértete <br><span style='font-size: 45px;'>40 MEGAS</span>",
                    color:'bg-warning',
                    colorBtn:"btn-warning",
                    colorHex: "#FFEA00",
                    description: 'Experimenta la velocidad como nadie <div style="width: 60%; margin: 0px auto; margin-top: 35px;"><hr class="text-white" style="color: #666; background-color: #FFFFFF;"></div>',
                    cost:"Descuento de por vida",
                    img:null,
                    descuento: null,
                    costDescription:"-$ 20 a partir del 6° mes<br><br>",
                    prontopago: "Pronto Pago $ 529"
                },
                {   id:2,
                    type: false, //Si es Internet + television
                    name: 'Diviértete + 100 MEGAS',
                    colorText:'text-info',
                    title: "Diviértete + <br><span style='font-size: 45px;'>100 MEGAS</span>",
                    color:'bg-info',
                    colorBtn:"btn-info",
                    colorHex: "#F04E98",
                    description: 'Experimenta la velocidad como nadie <div style="width: 60%; margin: 0px auto; margin-top: 35px;"><hr class="text-white" style="color: #666; background-color: #FFFFFF;"></div>',
                    cost:"Descuento de por vida",
                    img:null,
                    descuento: null,
                    costDescription:"- $ 30 a partir del 6° mes<br><br>",
                    prontopago: "Pronto Pago $ 629"
                },
                {   id:3,
                    type: false, //Si es Internet + television
                    name: 'Emociónate 200 MEGAS',
                    colorText:'text-primary',
                    title: "Emociónate <br><span style='font-size: 45px;'>200 MEGAS</span>",
                    color:'bg-primary',
                    colorBtn:"btn-primary",
                    colorHex: "#40C4FF",
                    description: 'Experimenta la velocidad como nadie <div style="width: 60%; margin: 0px auto; margin-top: 35px;"><hr class="text-white" style="color: #666; background-color: #FFFFFF;"></div>',
                    cost:"Descuento de por vida",
                    img:null,
                    descuento: null,
                    costDescription:"- $ 50 a partir del 6° mes<br><br>",
                    prontopago: "Pronto Pago $ 999"
                },
                {   id:4,
                    type: false, //Si es Internet + television
                    name: 'Sorpréndete 500 MEGAS',
                    colorText:'text-secondary',
                    title: "Sorpréndete <br><span style='font-size: 45px;'>500 MEGAS</span>",
                    color:'bg-secundary',
                    colorBtn:"btn-secondary",
                    colorHex: "#AE80FC",
                    description: 'Experimenta la velocidad como nadie <div style="width: 60%; margin: 0px auto; margin-top: 35px;"><hr class="text-white" style="color: #666; background-color: #FFFFFF;"></div>',
                    cost:"Descuento de por vida",
                    img:null,
                    descuento: null,
                    costDescription:"- $ 80 a partir del 6° mes<br><br>",
                    prontopago: "Pronto Pago $ 1,579"
                    },
            ],
            packTotal: [],
            packBtn: 1
        }
    },
    methods:{
        getTypeCard(val){
            this.packBtn = val;
            this.packTotal = ( val === 1 )? this.packInternetTV : this.packInternet;
            console.log("Estas aqui: ",this.packTotal );
        }
    }
}
</script>
