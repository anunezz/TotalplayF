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
                    <li @click="linkss" class="nav-item">
                        <router-link to="/">
                            <a class="nav-link">
                                <span id="nexmun"> Nexmun </span>
                            </a>
                        </router-link>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span id="netflix"> Totalplay + Netflix </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                        </div>
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
import { RouterPush } from '../Mixins/RouterPush.js';
export default {
mixins: [RouterPush]
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
    border-bottom: 2px solid #ffc107;
     transition: 0.8s;
}

.active > a.nav-link {
    border-bottom: 2px solid #ffc107;
}
</style>
