<template>
<div class="col-md-12">
    <el-dialog
        :visible.sync="modal"
        :width="mediaWidth"
        class="formDialog"
        :show-close="true"
        :close-on-click-modal="false"
        :close-on-press-escape="false">
        <div class="text-light">
            <el-row :gutter='20'>
                <el-col :span='24'>
                    <div style='width:100%; padding: 5px 0px; display:flex; justify-content: flex-start;'>
                        <div style="width:50%">
                    <div style="width: 100%; display:flex; justify-content: center;">
                        <div>
                        <strong style="font-family: Arial, sans-serif;
                                        font-size: 15pt; font-style: negrita;
                                        color: #A7D8F8;">Vive la experiencia!</strong> &nbsp; &nbsp;
                        <img src="img/publico/logo-totalplay-n.svg" alt="" class="tp-popup-logoo">
                        </div>
                    </div>
                            <div style="padding-bottom: 13px;">
                                <h3 class="text-center" style="color:rgb(109, 92, 150);">¡No te quedes sin internet veloz!</h3>
                                <h4 class="text-center" style="color: #d2a545;">Deja tus datos
                                Y te llamamos en segundos <br>
                                ¡Sin esperas!</h4>
                            </div>
                            <form-component v-if="modal" class="px-5" :modal="true" :promotion_id="promotion_id" @closeModalForm="closeModalForm" />
                        </div>
                    </div>
                </el-col>
            </el-row>
        </div>
    </el-dialog>
    <div class="row">
        <div class="d-flex justify-content-center flex-wrap" v-if="items.page !== 'home'">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 py-3 px-4" v-for="(item,index) in items" :key="index">
                <div class="card card-shadow" style="width: 100%; border-radius: 23px; overflow:hidden;">
                    <img class="card-img-top" :src="item.imgpromotion.fileNameHash" :alt="item.imgpromotion.fileName">
                    <div class="card-body card-click text-center"
                    :style="'cursor:pointer; background:'+item.color+';'">
                        <div>
                            <el-button plain @click="clickPromotion(item)" type="primary" style="width: 100%;" round >Contrata ya</el-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import {Globals} from "../../../mixins/Globals";
import Form from '../fragments/Form';
export default {
mixins:[Globals],
props: {
    items: Array
},
    components:{
        'form-component': Form
    },
data() {
    return {
        btn_double_triple: true,
        modal: false,
        promotion_id: null
    }
},
computed:{
    mediaWidth() {
        let aux = '65%';
        if(this.$screen.width < 950){
            aux = '95%';
        }
        return aux;
    }
},
methods:{
    closeModalForm(modal){
        this.modal = modal;
        this.$store._modules.root.state.totalplay.modalForm = this.modal;
        this.promotion_id = null;
    },
    clickPromotion(data){
        this.modal = true;
        this.$store._modules.root.state.totalplay.modalForm = this.modal;
        this.promotion_id = data.id;
        $(".el-dialog__title").css({"color":"white"});
        $(".formDialog > .el-dialog__header").remove();
        $(".formDialog > div").css({"background":"url("+data.imgpromotionmodal.fileNameHash+")","background-size": "100% 100%"});
    }
}
}
</script>

<style>
.card-shadow{
    -webkit-box-shadow: 5px 5px 47px 5px rgba(0,0,0,0.91);
    box-shadow: 5px 5px 47px 5px rgba(0,0,0,0.91);
}
</style>
