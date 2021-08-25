<template>
<div class="py-1 text-white">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12" style="font-size: 55px; font-style: italic;">
                Internet contratación personalizada para tus necesidades
            </div>
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img style="height: 350px; widht: 100%;" class="d-block w-100" src="https://img.freepik.com/foto-gratis/gente-negocios-alegre-trabajo-terminado-grupo-trabajadores-oficina-felices-alcanzar-sus-propios-records-tener-exito_146671-13631.jpg?size=626&ext=jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img style="height: 350px; widht: 100%;" class="d-block w-100" src="https://blog.grupo-pya.com/wp-content/uploads/2016/11/Recursos-definici%C3%B3n.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img style="height: 350px; widht: 100%;" class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRij_mV1fiW45OKKqdlqf19zD2nBUa5DEKA4Q&usqp=CAU" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>
        </div>

        <div class="py-2">
            <div class="d-flex align-items-center justify-content-around mt-3 flex-wrap">
                <figure class="text-center col-lg-4 mt-3">
                    <img src="https://www.eficasia.com/images/trayectoria/esr.png" class="img-fluid mb-3" alt="">
                    <p style="font-size: 14px;" class="mt-2">Desde el 2015, por 6 años consecutivos obtuvimos la certificación como Empresa Socialmente Responsable otorgado por el Centro Mexicano para la Filantropía (CEMEFI)
                    </p>
                </figure>
                <figure class="text-center col-lg-4">
                    <img src="https://www.eficasia.com/images/certificaciones/LogoIgualdad.jpg" class="img-fluid" width="100" alt="">
                    <p style="font-size: 14px;">1er Centro de Contacto en México que logra la Certificación en la Norma Mexicana NMX-R-025-SCFI-2015 en Igualdad Laboral y No Discriminación
                    </p>
                </figure>
                <figure class="text-center col-lg-4 mt-3">
                    <img src="https://www.eficasia.com/images/certificaciones/superEmpresas.png" class="img-fluid mb-2" width="120" alt="">
                    <p style="font-size: 14px;">Somos una Súper Empresa, uno de los lugares donde todos quieren trabajar
                    </p>
                </figure>
            </div>
        </div>

        <div class="row py-2 text-dark" >
            <div class="col-md-12">
                <div class="card bg-success border-success text-white mb-5" style="width: 100%;">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0jxNW9s8jjvchefT6bN4pzD4CN4YAi3klWQ&usqp=CAU" class="card-img" alt="...">
                        </div>
                        <div class="col-md-7" style="background-color: #32CD32;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card border-dark bg-dark mb-5 text-white" style="width: 100%;">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                        <img src="data:image/jpeg;base64,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" class="card-img" alt="...">
                        </div>
                        <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-primary border-primary mb-5 text-white" style="width: 100%;">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYy9wTTjTmBDlRrmhJC5i9c8-07GDFvYvNzQ&usqp=CAU" class="card-img" alt="...">
                        </div>
                        <div class="col-md-7" style="background-color: #696969">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
data(){
    return {
    }
},
mounted(){
    $('body, html').animate({scrollTop: '0px'}, 1100);
},
}
</script>

<style  scoped>



</style>
