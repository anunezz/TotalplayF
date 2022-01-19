<template>
<div class="div-index bg-inverse fixed-top">
    <nav class="navbar navbar-expand-lg mynav" style="background: #1e1e28;">
        <div class="container-fluid">

            <img loading="lazy" src="/img/publico/logo.png" width="145" height="30" class="d-inline-block align-top" alt="logo-totalplay-n">

            <button class="navbar-toggler text-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" data-toggle="collapse" data-target="#navbarNav" >
                <span class="text-info fa fa-navicon"></span>
            </button>

            <div class="collapse navbar-collapse navbar-nav text-center text-sm-center" id="navbarNav">
                <ul class="nav navbar-nav animatedd fastt fadeInn" :class="{ 'mc-auto': (screenWidth <= 991 ),'ml-auto': (screenWidth >= 992 )}">
                    <li @click="currentUrl(urlPath)" class="nav-item" :class="{ 'active': ( activeMenu == 0 ) }">
                        <router-link to="/" id="nav-item-nexmun" >
                            <a class="nav-link">
                                <span id="nexmun"> Nexmun </span>
                            </a>
                        </router-link>
                    </li>
                    <li class="nav-item dropdown" :class="{ active: ( activeMenu === 1 ) }">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" type="button" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span id="residencial"> Totalplay + Residencial </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <router-link  @click="currentUrl(urlPath)" to="/residencial/internet+tv">
                                <a class="dropdown-item">Internet + TV</a>
                            </router-link>
                            <router-link @click="currentUrl(urlPath)" to="/residencial/internet">
                                <a class="dropdown-item">Internet</a>
                            </router-link>
                        </div>
                    </li>
                    <li class="nav-item dropdown" :class="{ active: ( activeMenu === 2 ) }">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown2" type="button" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span id="netflix"> Totalplay + Netflix </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <router-link  @click="currentUrl(urlPath)" to="/netflix">
                                <a class="dropdown-item">Internet + TV</a>
                            </router-link>
                            <router-link @click="currentUrl(urlPath)" to="/netflix">
                                <a class="dropdown-item">Internet</a>
                            </router-link>
                        </div>
                    </li>
                    <li class="nav-item dropdown" :class="{ active: ( activeMenu === 3 ) }">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown3" type="button" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span id="amazon"> Totalplay + Amazon Prime </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                            <router-link  @click="currentUrl(urlPath)" to="/amazon-prime">
                                <a class="dropdown-item">Internet + TV</a>
                            </router-link>
                            <router-link @click="currentUrl(urlPath)" to="/amazon-prime">
                                <a class="dropdown-item">Internet</a>
                            </router-link>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</div>
</template>

<script>
import { mapState } from "vuex";
import { RouterPush } from '../Mixins/RouterPush';
export default {
mixins:[RouterPush],
computed:{
    ...mapState('menu',['activeMenu']),
    urlPath(){
        return this.$router.history.current.path;
    }
}
}
</script>

<style scoped>
.nav-item{
    margin-left: 20px;
}

.mynav a {
    outline:none;
    border-bottom: 4px solid transparent;
    text-decoration: none;
    font-size: 19px;
    font-weight: 700;
}

.nav-link:hover {
    outline:none;
    text-decoration: none;
    border-bottom: 3.5px solid #ffc107;
    /* animation: animate 4s linear ease-in-out; */
    transition-delay: 1s ease;
}

@keyframes animate {
    0%{
        background: green;
    }
    100%{
        background: red;
    }
}

.active > a.nav-link {
    border-bottom: 3.5px solid #ffc107;
}
</style>
