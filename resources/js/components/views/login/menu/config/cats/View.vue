<template>
<div class="row">

    <div class="col-md-12 py-2">
        <div class="row justify-content-md-between flex-wrap">
            <div class="col-md-6">
                <h4>Configuración de la vista Totalplay.</h4>
            </div>
            <div class="col-md-6">
                <router-link to="/login/configuracion/catalogos">
                    <button class="btn btn-danger btn-sm float-right"> <i class="el-icon-arrow-left"></i> Regresar</button>
                </router-link>
            </div>
        </div>
    </div>

    <div class="col-12 px-5 py-3">
        <el-tabs type="border-card" style="width: 100%;">
            <el-tab-pane label="Fondo de pantalla">
                <new-pack-wallpaper />
            </el-tab-pane>
            <el-tab-pane label="Slider imagenes">
                <slider-component />
            </el-tab-pane>
            <el-tab-pane label="Paquetes Banners">
                <banner-component />
            </el-tab-pane>
            <el-tab-pane label="Pie de pagina">
                <footer2-component />
            </el-tab-pane>
        </el-tabs>
    </div>

</div>
</template>

<script>
import newPackswallpaper from '../../../../fragments/FormNewWallpaper';
import newFormBanner from '../../../../fragments/FormBanner';
import newFormSlider from '../../../../fragments/FormSlider';
import newFormFooter2 from '../../../../fragments/newFormFooter2';
export default {
    components:{
        'new-pack-wallpaper': newPackswallpaper,
        'banner-component': newFormBanner,
        'slider-component': newFormSlider,
        'footer2-component': newFormFooter2,
    },
    data(){
        return {
        }
    },
    created(){

    },
    methods: {
    }
}
</script>

<style scoped>

</style>
