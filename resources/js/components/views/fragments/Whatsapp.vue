<template>
<div>
    <a href="tel:8005129092"
        class="cellphone"
        data-toggle="tooltip" data-placement="left"
        title="Llamanos y conseguiras más promociones"
        target="_blank"> <i class="fa fa-phone phone-icon"></i></a>

    <a href="https://wa.me/525527529436?text=Contactanos%20para%20más%20promociones%20Totalplay"
        class="whatsapp"
        data-toggle="tooltip" data-placement="left"
        title="Llamanos y conseguiras más promociones"
        target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>

    <a href="https://t.me/Totalplaycontratacionpersonaliza"
        class="telegram"
        data-toggle="tooltip" data-placement="left"
        title="Llamanos y conseguiras más promociones"
        target="_blank"> <i class="fa fa-telegram telegram-icon"></i></a>

</div>
</template>

<style>
.cellphone {
    text-decoration: none;
    cursor:pointer;
    position:fixed;
    width:60px;
    height:60px;
    bottom:150px;
    right:40px;
    background-color:#8246AF;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:30px;
    z-index:100;
}
.whatsapp {
    text-decoration: none;
    cursor:pointer;
    position:fixed;
    width:60px;
    height:60px;
    bottom:5px;
    right:40px;
    background-color:#25d366;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:30px;
    z-index:100;
}
.telegram {
    text-decoration: none;
    cursor:pointer;
    position:fixed;
    width:60px;
    height:60px;
    bottom:80px;
    right:40px;
    background-color: #3a6d99;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:30px;
    z-index:100;
    text-decoration: none;
}

.whatsapp-icon, .telegram-icon, .phone-icon{
    margin-top: 13px;
}

@media screen and (min-width: 0px) and (max-width: 1054px) {
    .phone-icon{
        margin-top: 8px;
    }

    .whatsapp, .telegram, .cellphone{
        width:  45px;
        height: 45px;
        right: 15px;
    }

    .cellphone {
        text-decoration: none;
        cursor:pointer;
        position:fixed;
        top: 305px;
        background-color: #8246AF;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        font-size:30px;
        z-index:120;
        text-decoration: none;
    }

    .telegram {
        text-decoration: none;
        cursor:pointer;
        position:fixed;
        top: 430px;
        background-color: #3a6d99;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        font-size:30px;
        z-index:100;
        text-decoration: none;
    }

.whatsapp {
    text-decoration: none;
    cursor:pointer;
    position:fixed;
    top: 370px;
    background-color:#25d366;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:30px;
    z-index:100;
}



    .whatsapp-icon, .telegram-icon, .telegram-icon{
        margin-top: 0px;
    }
}

</style>
