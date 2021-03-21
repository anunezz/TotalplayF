<template>
<div>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <el-tooltip class="item" effect="dark" content="Contacta para más promociones" placement="left-start">
        <a href="https://wa.me/525527529436?text=Contactanos%20para%20más%20promociones%20Totalplay" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
    </el-tooltip>
    <el-tooltip class="item" effect="dark" content="Llamanos y consiguiras mas promociones" placement="left-start">
        <a href="https://msng.link/o/?@Totalplaycontratacionpersonaliza=tg" class="telegram" target="_blank"> <i class="fa fa-telegram telegram-icon"></i></a>
    </el-tooltip>

</div>
</template>

<style>
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

.whatsapp-icon, .telegram-icon{
    margin-top: 13px;
}

@media screen and (min-width: 0px) and (max-width: 1054px) {
    .telegram {
        bottom: 60px;
    }

    .whatsapp, .telegram{
        width:  45px;
        height: 45px;
        right: 15px;
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



    .whatsapp-icon, .telegram-icon{
        margin-top: 0px;
    }
}

</style>
