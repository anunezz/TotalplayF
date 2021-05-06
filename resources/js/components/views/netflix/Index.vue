<template>
<div>
        <div class="container animated fadeIn fast contentMain">
            <img class="imgMain" loading="lazy" style="width: 100%;" src="/img/BanerNetflix.jpg" alt="BanerNetflix.jpg">
        </div>

        <div class="col-12 d-flex flex-column align-items-center animated fadeIn fast py-5 text-center" align="center">
            <div class="d-flex justify-content-center">
                <img loading="lazy" src="/img/publico/logo.png" class="d-inline-block align-top imgTotal" alt="logo-totalplay-n">
                <h1 class="text-white">&nbsp;&nbsp; + &nbsp;&nbsp;</h1>
                <img loading="lazy" src="/img/logo-netflix.png" class="d-inline-block align-top imgPack" alt="logo-totalplay-n">
            </div>
            <div>
                <h1 class="text-white">Totalplay TV + Internet</h1>
            </div>
        </div>

        <cards-component :typePack="false" :packTotal="packNetflix" />

        <div class="col-12 d-flex flex-column align-items-center animated fadeIn fast py-5 text-center" align="center">
            <div class="d-flex justify-content-center">
                <img loading="lazy" src="/img/publico/logo.png" class="d-inline-block align-top imgTotal" alt="logo-totalplay-n">
                <h1 class="text-white">&nbsp;&nbsp; + &nbsp;&nbsp;</h1>
                <img loading="lazy" src="/img/logo-netflix.png" class="d-inline-block align-top imgPack" alt="logo-totalplay-n">
            </div>
            <div>
                <h1 class="text-white">Internet</h1>
            </div>
        </div>

        <cards-component :typePack="false" :packTotal="packInternetNetflix" />

</div>
</template>

<script>
import Cards from '../fragments/Cards'
export default {
    components:{
        'cards-component':Cards,
    },
    metaInfo() {
        return {
        title: "Totalplay",
        meta: [
            {
            vmid: "Netflix",
            name: "Netflix",
            content: "Totalplay con Netflix incluido a precio especial hasta 4 pantallas (ULTRA HD) aplicación incluida apps integradas conectividad estable."
            }
        ],
        titleTemplate: '%s | Netflix',
            htmlAttrs: {
                lang: 'es',
                amp: true
            },
        };
    },
    mounted(){
        $('body, html').animate({scrollTop: '0px'}, 1100);
    },
    data() {
        return {
            packNetflix:[
                {   id:1,
                    type: true, //Si es Internet + television
                    name: 'Diviértete 40 Megas',
                    colorText:'text-warning',
                    title: "Diviértete <br><span style='font-size: 45px;'>40 MEGAS</span>",
                    color:'bg-wwarning',
                    colorBtn:"btn-wwarning",
                    colorHex: "#FFEA00",
                    description: 'Totalplay TV en una televisión <div style="width: 60%; margin: 0px auto; margin-top: 35px;"><hr class="text-white" style="color: #666; background-color: #FFFFFF;"></div>',
                    cost:"Doble de megas <br>80",
                    img: '/img/iconos/netflix_2p.svg',
                    descuento: "- $40 a partir del 6° mes",
                    costDescription:"por 3 meses<br><br>",
                    prontopago: "Pronto Pago $ 849"
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
                    cost: "Doble de megas <br>200",
                    img: '/img/iconos/netflix_2p.svg',
                    descuento: "- $70 a partir del 6° mes",
                    costDescription:"<strong>140 Canales (100 HD)</strong> <br> por 3 meses",
                    prontopago: "Pronto Pago $ 949"
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
                    img: '/img/iconos/netflix_4p.svg',
                    descuento: "- $80 a partir del 6° mes",
                    costDescription:"<strong>230 Canales (135 HD)</strong> <br> por 3 meses",
                    prontopago: "Pronto Pago $ 1,439"
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
                    img: '/img/iconos/netflix_4p.svg',
                    descuento: "- $100 a partir del 6° mes",
                    cost:"Todos los canales<br><br>",
                    costDescription:"<strong>280 Canales (165 HD)</strong> <br> por 3 meses",
                    prontopago: "Pronto Pago $ 2,019"
                    },
            ],
            packInternetNetflix:[
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
                    img: '/img/iconos/netflix_2p.svg',
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
                    img: '/img/iconos/netflix_2p.svg',
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
                    img: '/img/iconos/netflix_4p.svg',
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
                    img: '/img/iconos/netflix_4p.svg',
                    descuento: null,
                    costDescription:"- $ 80 a partir del 6° mes<br><br>",
                    prontopago: "Pronto Pago $ 1,579"
                    },
            ],
        }
    },
}
</script>
