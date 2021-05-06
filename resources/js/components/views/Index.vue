<template>
<div style="background-color: #1e1e28;">

    <!-- <loading-component v-if="$store._modules.root.state.totalplay.loading" /> -->

    <!-- <el-dialog
        :visible.sync="modal"
        :width="mediaWidth"
        class="ddd"
        :title="titleModal"
        :close-on-click-modal="false"
        :close-on-press-escape="false">
        <div class="text-light" v-if="section">
            <el-row :gutter='20'>
                <el-col :span='24'>
                    <el-input
                        prefix-icon="el-icon-search"
                        size="mini"
                        style="width: 100%;"
                        placeholder="Buscar estado"
                        v-model="searchState"
                        clearable>
                    </el-input>
                </el-col>
                <el-col :span='24'>
                    <br>
                        <el-radio-group
                                :max="1"
                                v-model="selectCity">
                            <el-row :gutter='20'>
                                <el-col  :span='8' v-for="(item, index) in $store._modules.root.state.totalplay.catCities.filter(data => !searchState || data.name.toLowerCase().includes(searchState.toLowerCase()))" :key="index">
                                    <el-radio style="width: 100%;" :label="item.id"> {{item.name}} </el-radio>
                                </el-col>
                            </el-row>
                        </el-radio-group>
                </el-col>
                <el-col :span='24'>
                    <div style='width:100%; padding: 5px 0px; display:flex; justify-content: flex-end;'>
                        <div>
                            <el-button icon="el-icon-location-outline" size="mini" type="danger" @click="submitCity">Seleccionar cobertura</el-button>
                        </div>
                    </div>
                </el-col>
            </el-row>
        </div>
        <div  class="text-light" v-else>
            <el-row :gutter='20'>
                <el-form :model="form" ref="formLogin">
                    <el-col :span='24'>
                        <el-form-item prop="email"
                            :rules="[{ required: true, message: message.ruleForm.required },
                                    { pattern: email, message: message.ruleForm.special_characters_email, trigger: ['blur','change']}]">
                            <el-input v-model="form.email" size="mini" placeholder="Correo eléctronico"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span='24'>
                        <el-form-item>
                            <el-input type="password" v-model="form.password" size="mini" placeholder="Password"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span='24'>
                        <el-form-item style="display:flex; justify-content: center;">
                            <div style="margin: 0px auto;">
                                <el-button type="primary" size="mini" @click="login">Iniciar Sesión</el-button>
                            </div>
                        </el-form-item>
                    </el-col>
                </el-form>
            </el-row>
        </div>
    </el-dialog> -->

    <div class="div-index nabarr bg-inverse fixed-top">
        <!-- <div class="bg-light" style="color: #6d5c96;">
            <div class="d-flex flex-wrap py-2 justify-content-center">
                <div>
                    <div>Selecciona tu ciudad: <a @click="modal = true, section = true" style="cursor:pointer;"><i class="el-icon-location-outline"></i> {{ state_name === null ? 'Ciudad de México': state_name }} </a></div>
                </div>
            </div>
        </div> -->

        <nav class="navbar navbar-expand-lg" style="background: #1e1e28;">
            <div class="container-fluid">
                <a @click="linkss">
                    <router-link  class="navbar-brand" to="/">
                        <img loading="lazy" src="/img/publico/logo.png" width="145" height="30" class="d-inline-block align-top" alt="logo-totalplay-n">
                    </router-link>
                </a>

                <button class="navbar-toggler text-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" data-toggle="collapse" data-target="#navbarNav" >
                    <span class="text-info fa fa-navicon"></span>
                </button>

                <div class="collapse navbar-collapse navbar-nav text-center text-sm-center" id="navbarNav">
                    <ul class="nav navbar-nav animatedd fastt fadeInn" :class="{ 'mc-auto': (screenWidth <= 991 ),'ml-auto': (screenWidth >= 992 )}">
                        <li @click="linkss" class="nav-item">
                            <router-link to="/" class="nav-link" aria-current="page"> <span id="inicio"> Residencial </span> </router-link>
                        </li>
                        <li @click="linkss" class="nav-item">
                            <router-link to="/netflix" exact class="nav-link" aria-current="page"> <span id="netflix"> Totalplay + Netflix </span> </router-link>
                        </li>
                        <li @click="linkss" class="nav-item">
                            <router-link to="/amazon" exact class="nav-link" aria-current="page"> <span id="amazon"> Totalplay + Amazon Prime </span> </router-link>
                        </li>
                        <li class="nav-item" v-if="$store.state.user.fullname">
                            <router-link @click="linkss" to="/login" exact class="nav-link" aria-current="page"> <span id="dashboard"> Acceso </span> </router-link>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
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
import WhatsappComponent from "../../components/views/fragments/Whatsapp";
import Footer2Component from "../../components//views/fragments/Footer2";
import FormMain from '../../components/views/fragments/FormBanerRight';

export default {
components:{
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
created() {
        //this.getCats();
        let dialog = localStorage.getItem("dialog");
        //localStorage.clear();

        if (dialog) {
            this.modal = false;
            this.selectCity = parseInt( localStorage.getItem('selectCity') );
            this.state_name = localStorage.getItem('state_name');
        }else{
            setTimeout(() => {
                this.modal = true;
            }, 3800);
        }

        //this.$store._modules.root.state.publicc.loading = false;
},
mounted(){
    this.linkss();
    $(".ddd > div").css({"background-color":"#343a40","color":"white"});
    $(".el-dialog__title").css({"color":"white"});
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
    logout() {
        this.$store._modules.root.state.totalplay.loading = true;
        axios.post("/api/logout").then(response => {
            if (response.data.authenticated === false) {
                sessionStorage.removeItem("access_token");
                sessionStorage.removeItem("access_token_expiration");
                sessionStorage.removeItem("access_hash");

                setTimeout(() => {
                    this.$store._modules.root.state.totalplay.loading = false;
                    axios.defaults.headers.common = {
                        Authorization: "Bearer"
                    };
                    this.$store.commit('deleteUser');
                    this.$router.push("/");
                }, 3000);
            } else {
                this.$store._modules.root.state.totalplay.loading = false;
                this.$message({
                    type: "warning",
                    message: "No fue posible cerrar su sesión, inténtelo nuevamente."
                });
            }
        });
    },
    login(){
        //if (sessionStorage.getItem('access_token') === null) {
            this.$store._modules.root.state.totalplay.loading = true;
            this.$refs['formLogin'].validate((valid) => {
                if (valid) {
                    axios.post('/api/login',this.form, {
                                        headers:
                                            {
                                                'X-Requested-With': 'XMLHttpRequest',
                                                'Accept': 'application/json',
                                                'Accept-C': window.acceptC
                                            }
                    }).then(response => {
                        if (response.data.authenticated === true) {
                            sessionStorage.setItem('access_token', response.data.access_session);
                            sessionStorage.setItem('access_token_expiration', response.data.access_session_expiration);
                            sessionStorage.setItem('access_hash', response.data.access_hash);

                            axios.defaults.headers.common = {
                                'Accept-C': window.acceptC,
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                                'Authorization': 'Bearer ' + sessionStorage.getItem('access_token')
                            };

                            this.$store.commit('setUser', response.data.user);
                            setTimeout(() => {
                                this.modal = false;
                                this.$store._modules.root.state.totalplay.loading = false;
                                if(response.data.first_sesion){
                                    this.$router.push('/login/credenciales');
                                }else{
                                    this.$router.push('/login');
                                }
                            }, 3000);
                        } else{
                            this.$store._modules.root.state.totalplay.loading = false;
                            this.accessLogin = false;
                            this.$message({
                                message: 'Error en las credenciales.',
                                type: 'warning'
                            });
                            //this.$router.push('/');
                        }
                    }).catch(error => {
                        this.$message({
                            message: 'No se pudo completar la acción.',
                            type: 'warning'
                        });
                        this.modal = false;
                        this.$store._modules.root.state.totalplay.loading = false;
                        this.$router.push('/');
                    });

                } else {
                    this.$message({
                        message: 'No se pudo completar la acción.',
                        type: 'warning'
                    });
                    return false;
                }
            });

        //}
    },
    submitCity(){
        if( this.selectCity === 0 || this.selectCity === null || this.selectCity.length === 0 ){
            this.state_name = 'Ciudad de México';
            localStorage.setItem('selectCity','9');
            this.modal = true;
        }else{
            this.state_name =  this.$store._modules.root.state.totalplay.catCities.find(item => item.id === this.selectCity).name;
            this.modal = false;
        }

        localStorage.setItem('selectCity',String(this.selectCity));
        localStorage.setItem('state_name',String(this.state_name));
        localStorage.setItem('dialog',String(this.modal));
        this.setPacks(true);
    },

    linkss(){
        let aux = this.$router.history.current.path;
        switch (aux) {
            case '/netflix':
            {
                document.getElementById("netflix").style.color = "#B71C1C";
                document.getElementById("inicio").style.color = "#fff";
                document.getElementById("amazon").style.color = "#fff";
                break;
            }
            case '/amazon':
            {
                document.getElementById("amazon").style.color = "#81D4FA";
                document.getElementById("inicio").style.color = "#fff";
                document.getElementById("netflix").style.color = "#fff";
                break;
            }
            case '/':
            {
                document.getElementById("amazon").style.color = "#fff";
                document.getElementById("inicio").style.color = "#FFEB3B";
                document.getElementById("netflix").style.color = "#fff";
                break;
            }
            case '/terminos-y-condiciones':
            {
                document.getElementById("amazon").style.color = "#fff";
                document.getElementById("inicio").style.color = "#fff";
                document.getElementById("netflix").style.color = "#fff";
                break;
            }
            default:
            {
                document.getElementById("amazon").style.color = "#fff";
                document.getElementById("inicio").style.color = "#FFEB3B";
                document.getElementById("netflix").style.color = "#fff";
                break;
            }
        }
    },

},
}
</script>


<style>
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
