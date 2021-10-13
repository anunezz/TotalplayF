<template>
<div class="div-index nabarr bg-inverse fixed-top">
    <nav class="navbar navbar-expand-lg mynav" style="background: #1e1e28;">
        <div class="container-fluid">

            <img loading="lazy" src="/img/publico/logo.png" width="145" height="30" class="d-inline-block align-top" alt="logo-totalplay-n">

            <button class="navbar-toggler text-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" data-toggle="collapse" data-target="#navbarNav" >
                <span class="text-info fa fa-navicon"></span>
            </button>

            <div class="collapse navbar-collapse navbar-nav text-center text-sm-center" id="navbarNav">
                <ul class="nav navbar-nav animatedd fastt fadeInn" :class="{ 'mc-auto': (screenWidth <= 991 ),'ml-auto': (screenWidth >= 992 )}">
                    <li @click="linkss" class="nav-item">
                        <router-link to="/">
                            <a class="nav-link">
                                <span id="nexmun"> Nexmun </span>
                            </a>
                        </router-link>
                    </li>
                    <li @click="linkss" class="nav-item">
                        <router-link to="/residencial">
                            <a class="nav-link dropdown-toggle">
                                <span id="residencial"> Totalplay + Residencial </span>
                            </a>
                        </router-link>
                    </li>
                    <li @click="linkss" class="nav-item">
                        <router-link to="/netflix">
                            <a class="nav-link">
                                <span id="netflix"> Totalplay + Netflix </span>
                            </a>
                        </router-link>
                    </li>
                    <li @click="linkss" class="nav-item">
                        <router-link to="/amazon">
                            <a class="nav-link">
                                <span id="amazon"> Totalplay + Amazon Prime </span>
                            </a>
                        </router-link>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</div>
</template>

<script>
export default {
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
</style>
