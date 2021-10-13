<template>
<div style="background-color: #1e1e28;">

    <menu-component />
    <footer2-component  style="margin-top: 45px; z-index: 500;" />

    <div style="width: 100%; height: 28px;"></div>

    <router-view  />
    <whatsapp-component />

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
                        <a @click="linkss">
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
import MenuComponent from "../../components/views/fragments/Menu.vue";
import WhatsappComponent from "../../components/views/fragments/Whatsapp";
import Footer2Component from "../../components//views/fragments/Footer2";
import FormMain from '../../components/views/fragments/FormBanerRight';

export default {
components:{
    'menu-component': MenuComponent,
    'whatsapp-component':WhatsappComponent,
    'footer2-component':Footer2Component,
    'form-baner-component': FormMain
},
data() {
    return {
        visibleLogout:false,
        link: null,
        modal: false,
        section: true,
        searchState: null,
        selectCity: [],
        state_name: null,
        form:{
            email: null,
            password: null
        }
    }
},
computed: {
//https://github.com/reegodev/vue-screen
    mediaWidth() {
        let width = '';
        if( this.$screen.width < 950 ){
            if (this.section === true) {
                width = '95%';
            }else{
                width = '70%';
            }
        }else{
            if (this.section === true) {
                width = '65%';
            }else{
                width = '25%';
            }
        }
        return width;
    },
    screenWidth() {
        // let aux = 'mr-auto';
        // if(this.$screen.width >= 991 ){
        //     let aux = 'mc-auto';
        // }
        let aux = this.$screen.width;

        return aux;
    },
    titleModal(){
        return this.section ? "Selecciona la cobertura de tu ciudad" : "Iniciar sesión";
    }
},

mounted(){
    this.linkss();
},
methods: {
    modalLogin(){
        this.modal = true;
        this.section = false;
        this.form = {
            email: null,
            password: null
        };
        setTimeout(() => {
            this.$refs['formLogin'].clearValidate();
        }, 500);
    },
    linkss(){
        let aux = this.$router.history.current.path;
            document.getElementById("nexmun").style.color = "#fff";
            document.getElementById("residencial").style.color = "#fff";
            document.getElementById("netflix").style.color = "#fff";
            document.getElementById("amazon").style.color = "#fff";
        console.log("Path: ",aux);
        switch (aux) {
            case '/':
            {
                document.getElementById("nexmun").style.color = "#6f42c1";
                break;
            }
            case '/residencial':
            {
                document.getElementById("residencial").style.color = "#FFEB3B";
                break;
            }
            case '/netflix':
            {
                document.getElementById("netflix").style.color = "#B71C1C";
                break;
            }
            case '/amazon':
            {
                document.getElementById("amazon").style.color = "#81D4FA";
                break;
            }
            case '/terminos-y-condiciones':
            {
                document.getElementById("nexmun").style.color = "#fff";
                document.getElementById("residencial").style.color = "#fff";
                document.getElementById("netflix").style.color = "#fff";
                document.getElementById("amazon").style.color = "#fff";
                break;
            }
            default:
            {
                document.getElementById("nexmun").style.color = "#fff";
                document.getElementById("residencial").style.color = "#fff";
                document.getElementById("netflix").style.color = "#fff";
                document.getElementById("amazon").style.color = "#fff";
                break;
            }
        }
    },

},
}
</script>


<style>

.mynav a {
    margin-right: 20px;
    outline:none;
    /* color: green !important; */
    border-bottom: 3px solid transparent;
}

.mynav a{
    text-decoration: none;
    font-size: 19px;
    font-weight: 700;
    margin-left: 17px;
}

.mynav a:hover {
    outline:none;
    text-decoration: none;
    border-bottom: 2px solid #ffc107;
}

.active a {
    border-bottom: 2px solid #ffc107;
}

.contentMain:hover .imgMain {
    -webkit-transform:scale(1.05);
    transform:scale(1.05);
    transition:all .5s ease-in-out;
}
.contentMain {overflow:hidden;}

.nav-link:hover{
    animation: heartBeat;
    animation-duration: 2s;
}

a:hover{
    cursor:pointer;
}

.div-index .footer2{
    position: sticky;
    top: 0px;
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
